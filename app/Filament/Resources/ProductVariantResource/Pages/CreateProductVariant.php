<?php

namespace App\Filament\Resources\ProductVariantResource\Pages;

use App\Filament\Resources\ProductVariantResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Validator;
use Filament\Notifications\Notification;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;

class CreateProductVariant extends CreateRecord
{
    protected static string $resource = ProductVariantResource::class;

    protected function handleRecordCreation(array $data): Model
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

        return parent::handleRecordCreation($data);
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->title('Variant created')
        ->body('New variant has been created successfully');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
