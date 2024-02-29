<?php

namespace App\Filament\Admin\Resources\ProfilUsahaResource\Pages;

use App\Filament\Admin\Resources\ProfilUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilUsahas extends ListRecords
{
    protected static string $resource = ProfilUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
