<?php

namespace App\Filament\Resources\Coves\Pages;

use App\Filament\Resources\Coves\CoveResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCove extends EditRecord
{
    protected static string $resource = CoveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
