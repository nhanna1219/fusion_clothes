<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\PaymentDetail;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $order = static::getModel()::create($data);

            PaymentDetail::create([
                'order_id' => $order->id,
                'amount' => $data['total'] ?? 0,
                'payment_method' => $data['payment_method'] ?? 'COD',
                'status' => $data['payment_status'] ?? 'Unpaid', 
                'created_at' => now(),
                'modified_at' => now(),
            ]);

            return $order;
        });
    }
}
