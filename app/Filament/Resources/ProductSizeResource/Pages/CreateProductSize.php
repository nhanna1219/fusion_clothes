<?php

namespace App\Filament\Resources\ProductSizeResource\Pages;

use App\Filament\Resources\ProductSizeResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateProductSize extends CreateRecord
{
    protected static string $resource = ProductSizeResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->title('Size created')
        ->body('New size has been created successfully');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
