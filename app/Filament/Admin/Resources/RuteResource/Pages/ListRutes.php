<?php

namespace App\Filament\Admin\Resources\RuteResource\Pages;

use App\Filament\Admin\Resources\RuteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRutes extends ListRecords
{
    protected static string $resource = RuteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
