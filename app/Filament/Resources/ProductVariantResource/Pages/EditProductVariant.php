<?php

namespace App\Filament\Resources\ProductVariantResource\Pages;

use App\Filament\Resources\ProductVariantResource;
use App\Models\ProductVariant;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditProductVariant extends EditRecord
{
    protected static string $resource = ProductVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $existingVariant = ProductVariant::where('product_id', $data['product_id'])
            ->where('size_id', $data['size_id'])
            ->where('color_id', $data['color_id'])
            ->first();

        if ($existingVariant) {
            Notification::make()
                ->title('Error')
                ->body('A variant with the same product, size, and color already exists.')
                ->danger()
                ->send();
            $this->halt();
        }

        return parent::handleRecordUpdate($record, $data);
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->title('Variant updated')
        ->body('The variant has been saved successfully');
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
