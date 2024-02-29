<?php

namespace App\Filament\Admin\Resources\ProfilUsahaResource\Pages;

use App\Filament\Admin\Resources\ProfilUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilUsaha extends EditRecord
{
    protected static string $resource = ProfilUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
