<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum OrderStatus: string implements HasIcon, HasLabel, HasColor
{
    case PENDING = 'Pending';
    case PROCESSING = 'Processing';
    case ON_DELIVERY = 'On Delivery';
    case CANCELLED = 'Cancelled';
    case SHIPPED = 'Shipped';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::PROCESSING => 'Processing',
            self::ON_DELIVERY => 'On Delivery',
            self::CANCELLED => 'Cancelled',
            self::SHIPPED => 'Shipped',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::PROCESSING => 'primary',
            self::ON_DELIVERY => 'info',
            self::CANCELLED => 'danger',
            self::SHIPPED =>'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PENDING => 'heroicon-o-pencil',
            self::PROCESSING => 'heroicon-o-clock',
            self::ON_DELIVERY => 'heroicon-o-rocket-launch',
            self::CANCELLED => 'heroicon-o-x-circle',
            self::SHIPPED => 'heroicon-o-check-circle',
        };
    }
}