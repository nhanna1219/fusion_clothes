<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductSizeResource\Pages;
use App\Filament\Resources\ProductSizeResource\RelationManagers;
use App\Models\ProductSize;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductSizeResource extends Resource
{
    protected static ?string $model = ProductSize::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-pointing-out';

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?string $modelLabel = 'Sizes';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('size_description')
                    ->maxLength(50)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('size_description')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record, Tables\Actions\DeleteAction $action) {
                        if ($record->variants()->count() > 0) {
                            Notification::make()
                                ->title('Cannot Delete')
                                ->body('This size is associated with one or more variants and cannot be deleted.')
                                ->danger()
                                ->send();

                            $action->cancel();
                        }
                    })
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Size deleted')
                            ->body('The user has been deleted successfully.'),
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records, Tables\Actions\DeleteBulkAction $action) {
                            $recordsWithVariants = $records->filter(fn ($record) => $record->variants()->count() > 0);

                            if ($recordsWithVariants->isNotEmpty()) {
                                Notification::make()
                                    ->title('Cannot Delete')
                                    ->body('One or more sizes are associated with variants and cannot be deleted.')
                                    ->danger()
                                    ->send();

                                $action->cancel();
                            }
                        })
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('Sizes deleted')
                                ->body('The selected sizes have been deleted successfully.'),
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
            'index' => Pages\ListProductSizes::route('/'),
            'create' => Pages\CreateProductSize::route('/create'),
            // 'view' => Pages\ViewProductSize::route('/{record}'),
            'edit' => Pages\EditProductSize::route('/{record}/edit'),
        ];
    }
}
