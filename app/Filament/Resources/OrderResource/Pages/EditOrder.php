<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\PaymentDetail;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Livewire\Attributes\On;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            //Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->updatePaymentMethod($this->record->id, $data['payment_method'], $data['payment_status']);
        return $data;
    }

    private function updatePaymentMethod($orderId, $paymentMethod, $paymentStatus)
    {
        $paymentDetail = PaymentDetail::where('order_id', $orderId)->first();
        if ($paymentDetail) {
            $paymentDetail->update(['payment_method' => $paymentMethod, 'status' => $paymentStatus]);
        } else {
            PaymentDetail::create([
                'order_id' => $orderId,
                'payment_method' => $paymentMethod,
                'status' => $paymentStatus
            ]);
        }
    }
}
