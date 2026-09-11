<?php

namespace App\Filament\Resources\Coves\Pages;

use App\Filament\Resources\Coves\CoveResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCoves extends ListRecords
{
    protected static string $resource = CoveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
