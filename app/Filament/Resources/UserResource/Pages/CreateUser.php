<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $existingUser = User::where('email', $data['email'])
            ->first();

        if ($existingUser) {
            Notification::make()
                ->title('Error')
                ->body('A user with the same email already exists.')
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
        ->title('User created')
        ->body('New user has been created successfully');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
