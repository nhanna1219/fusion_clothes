<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\ProductVariant;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';

    protected static array $status = [
        'Pending' => 'Pending',
        'Processing' => 'Processing',
        'On Delivery' => 'On Delivery',
        'Cancelled' => 'Cancelled',
        'Shipped' => 'Shipped',
    ];

    public static function query(): Builder
    {
        return parent::query()
            ->with(['orderDetail.productVariant.product', 'orderDetail.productVariant.size', 'orderDetail.productVariant.color', 'paymentDetail']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Order Info')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->native(false)
                            ->required()
                            ->columnSpan(1)
                            ->disabled(fn(Get $get) => !self::isModifiableStatus($get('status'))),
                        Forms\Components\TextInput::make('total')
                            ->readOnly()
                            ->columnSpan(1)
                            ->prefix('$')
                            ->afterStateHydrated(function (Get $get, Set $set) {
                                self::updateTotals($get, $set);
                            })
                            ->disabled(fn(Get $get) => !self::isModifiableStatus($get('status')))
                            ->columnSpan(1),
                        Forms\Components\Hidden::make('payment_status'),
                        Forms\Components\Hidden::make('payment_id'),
                        Forms\Components\Select::make('payment_method')
                            ->label('Payment Method')
                            ->options([
                                'COD' => 'COD',
                                'Momo' => 'Momo',
                            ])
                            ->default('COD')
                            ->native(false)
                            ->required()
                            ->columnSpan(1)
                            ->afterStateHydrated(function (Get $get, Set $set) {
                                $order = Order::find($get('id'));
                                if ($order) {
                                    $payment = PaymentDetail::where('order_id', $order->id)->first();
                                    if ($payment) {
                                        $set('payment_id', $payment->id);
                                        $set('payment_method', $payment->payment_method);
                                    }
                                }
                            })
                            ->disabled(fn(Get $get) => !self::isModifiableStatus($get('status'))),
                        Forms\Components\ToggleButtons::make('status')
                            ->options(self::$status)
                            ->disableOptionWhen(function ($value, $state) {
                                return ($state === 'Shipped' && in_array($value, ['Pending', 'Processing', 'On Delivery', 'Cancelled'])) ||
                                    ($state === 'Cancelled' && in_array($value, ['Pending', 'Processing', 'On Delivery', 'Shipped']));
                            })
                            ->colors([
                                'Pending' => 'warning',
                                'Processing' => 'primary',
                                'On Delivery' => 'info',
                                'Cancelled' => 'danger',
                                'Shipped' => 'success',
                            ])
                            ->icons([
                                'Pending' => 'heroicon-o-pencil',
                                'Processing' => 'heroicon-o-clock',
                                'On Delivery' => 'heroicon-o-rocket-launch',
                                'Cancelled' => 'heroicon-o-x-circle',
                                'Shipped' => 'heroicon-o-check-circle',
                            ])
                            ->inline()
                            ->required()
                            ->default('Pending')
                            ->columnSpanFull()
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                $state = $get('status');
                                $method = $get('payment_method');

                                if ($method == 'Momo') {
                                    if ($state == 'Cancelled') {
                                        $set('payment_status', 'Refunded');
                                    } else {
                                        $set('payment_status', 'Paid');
                                    }
                                } else {
                                    if (self::isModifiableStatus($state) || ($state == 'Cancelled')) {
                                        $set('payment_status', 'Unpaid');
                                    } else {
                                        $set('payment_status', 'Paid');
                                    }
                                }
                            }),
                    ])->columns(3),
                Forms\Components\Repeater::make('orderDetail')
                    ->relationship('orderDetail')
                    ->afterStateHydrated(function (Get $get, Set $set) {
                        self::updateTotals($get, $set);
                    })
                    ->schema([
                        Forms\Components\FieldSet::make()
                            ->label('Product Details')
                            ->columns(2)
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->label('Name')
                                    ->native(false)
                                    ->options(Product::whereHas('variants')->pluck('name', 'id')->toArray())
                                    ->reactive()
                                    ->required()
                                    ->afterStateUpdated(function (callable $get, callable $set, $state) {
                                        $product = Product::find($state);
                                        if ($product) {
                                            $set('product_price', $product->price);
                                            $set('size_id', null);
                                            $set('color_id', null);
                                        }
                                    }),
                                Forms\Components\Hidden::make('product_variant_id')
                                    ->afterStateHydrated(function (Get $get, Set $set) {
                                        $productVariantId = $get('product_variant_id');
                                        if ($productVariantId) {
                                            $productVariant = ProductVariant::find($productVariantId);
                                            if ($productVariant) {
                                                $set('product_id', $productVariant->product_id);
                                                $set('size_id', $productVariant->size_id);
                                                $set('color_id', $productVariant->color_id);
                                                $set('product_price', $productVariant->product->price);
                                            }
                                        }
                                    }),
                                Forms\Components\TextInput::make('product_price')
                                    ->label('Price')
                                    ->prefix('$')
                                    ->readOnly(),
                                Forms\Components\Select::make('size_id')
                                    ->label('Size')
                                    ->native(false)
                                    ->options(function ($get) {
                                        $productId = $get('product_id');
                                        if (!$productId) {
                                            return [];
                                        }
                                        $productVariant = ProductVariant::where('product_id', $productId)
                                        ->get()
                                        ->pluck('size.size_description', 'size_id');
                                        if ($productVariant->contains(null)) {
                                            return [
                                                '' => 'No sizes found'
                                            ];
                                        }
                                        return $productVariant;
                                    })
                                    ->reactive()
                                    ->required()
                                    ->afterStateUpdated(function (callable $get, callable $set, $state) {
                                        $productVariants = ProductVariant::where('product_id', $get('product_id'))->where('size_id', $state)->get();
                                        if ($productVariants){
                                            $colors = $productVariants->pluck('color.color_name', 'color_id');
                                            $set('colors', $colors);
                                            $set('color_id', null);
                                        }
                                    }),
                                Forms\Components\Select::make('color_id')
                                    ->label('Color')
                                    ->native(false)
                                    ->options(function ($get) {
                                        return $get('colors') ?: [
                                            '' => 'No colors found'
                                        ];
                                    })
                                    ->reactive()
                                    ->required()
                                    ->afterStateUpdated(function (callable $get, callable $set) {
                                        $productVariant = ProductVariant::where('product_id', $get('product_id'))
                                            ->where('size_id', $get('size_id'))
                                            ->where('color_id', $get('color_id'))
                                            ->first();
                                        $set('product_variant_id', $productVariant ? $productVariant->id : null);
                                    }),
                            ]),
                        Forms\Components\TextInput::make('quantity')
                            ->label('Quantity')
                            ->required()
                            ->numeric()
                            ->default(1)
                            ->columnSpanFull(),
                    ])
                    ->label('Order Details')
                    ->addActionLabel('Add order details')
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        self::updateTotals($get, $set);
                    })
                    ->disabled(fn(Get $get) => !self::isModifiableStatus($get('status')))
                    ->deleteAction(
                        fn(Forms\Components\Actions\Action $action) => $action->after(fn(Get $get, Set $set) => self::updateTotals($get, $set)),
                    )
                    ->addAction(function (Get $get, Set $set) {
                        self::updateTotals($get, $set);
                    })
                    ->reorderable(false)
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paymentDetail.payment_method')
                    ->label('Payment Method')
                    ->sortable(),
                Tables\Columns\TextColumn::make('paymentDetail.status')
                    ->label('Payment Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->striped()
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(self::$status)
                    ->label('Status')
                    ->default('')
                    ->native(false)
                    ->multiple(),
                Tables\Filters\SelectFilter::make('payment_method')
                    ->options([
                        'COD' => 'COD',
                        'Momo' => 'Momo',
                    ])
                    ->label('Payment Method')
                    ->native(false)
                    ->multiple()
                    ->query(function ($query, array $data) {
                        if (!empty($data['values'])) {
                            $query->whereHas('paymentDetail', function ($query) use ($data) {
                                $query->whereIn('payment_method', $data['values']);
                            });
                        }
                    }),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'Paid' => 'Paid',
                        'Unpaid' => 'Unpaid',
                        'Refunded' => 'Refunded',
                    ])
                    ->label('Payment Status')
                    ->native(false)
                    ->multiple()
                    ->query(function ($query, array $data) {
                        if (!empty($data['values'])) {
                            $query->whereHas('paymentDetail', function ($query) use ($data) {
                                $query->whereIn('status', $data['values']);
                            });
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Order deleted')
                            ->body('The order has been deleted successfully.'),
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('Orders deleted')
                                ->body('The selected orders have been deleted successfully.'),
                        ),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'warning';
    }

    public static function updateTotals(Get $get, Set $set): void
    {
        $selectedProducts = collect($get('orderDetail'))->filter(fn($item) => !empty($item['product_variant_id']) && !empty($item['quantity']));

        $prices = ProductVariant::find($selectedProducts->pluck('product_variant_id'))->pluck('product.price', 'id');

        $subtotal = $selectedProducts->reduce(function ($subtotal, $product) use ($prices) {
            return $subtotal + ($prices[$product['product_variant_id']] * $product['quantity']);
        }, 0);

        $set('total', number_format($subtotal, 2, '.', ''));
    }

    private static function isModifiableStatus($status)
    {
        return !in_array($status, ['Cancelled', 'Shipped']);
    }
}
