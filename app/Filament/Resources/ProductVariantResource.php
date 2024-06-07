<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductVariantResource\Pages;
use App\Filament\Resources\ProductVariantResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductVariantResource extends Resource
{
    protected static ?string $model = ProductVariant::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?string $modelLabel = 'Variants';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('size_id')
                    ->relationship('size', 'size_description')
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('color_id')
                    ->relationship('color', 'color_name')
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('size.size_description')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('color.color_name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->relationship('product', 'name')
                    ->label('Product')
                    ->native(false)
                    ->preload()
                    ->multiple(),
                Tables\Filters\SelectFilter::make('size_id')
                    ->relationship('size', 'size_description')
                    ->label('Size')
                    ->native(false)
                    ->preload()
                    ->multiple(),
                Tables\Filters\SelectFilter::make('color_id')
                    ->relationship('color', 'color_name')
                    ->label('Color')
                    ->native(false)
                    ->preload()
                    ->multiple()
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Tables\Actions\DeleteAction $action, $record) {
                        if ($record->orderDetails()->count() > 0) {
                            Notification::make()
                                ->danger()
                                ->title('Cannot delete')
                                ->body('This variant is associated with an order and cannot be deleted.')
                                ->send();

                            $action->halt();
                        }
                    })
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Variant deleted')
                            ->body('The variant has been deleted successfully.'),
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Tables\Actions\DeleteBulkAction $action, $records) {
                            $hasOrderDetails = $records->filter(function ($record) {
                                return $record->orderDetails()->count() > 0;
                            });

                            if ($hasOrderDetails->isNotEmpty()) {
                                Notification::make()
                                    ->danger()
                                    ->title('Cannot delete')
                                    ->body('One or more variants are associated with orders and cannot be deleted.')
                                    ->send();

                                $action->halt();
                            }
                        })
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('Variants deleted')
                                ->body('The selected variants have been deleted successfully.'),
                        ),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductVariants::route('/'),
            'create' => Pages\CreateProductVariant::route('/create'),
            // 'view' => Pages\ViewProductVariant::route('/{record}'),
            'edit' => Pages\EditProductVariant::route('/{record}/edit'),
        ];
    }
}
