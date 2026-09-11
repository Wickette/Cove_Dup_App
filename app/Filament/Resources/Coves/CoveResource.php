<?php

namespace App\Filament\Resources\Coves;

use App\Filament\Resources\Coves\Pages\CreateCove;
use App\Filament\Resources\Coves\Pages\EditCove;
use App\Filament\Resources\Coves\Pages\ListCoves;
use App\Filament\Resources\Coves\Schemas\CoveForm;
use App\Filament\Resources\Coves\Tables\CovesTable;
use App\Models\Cove;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CoveResource extends Resource
{
    protected static ?string $model = Cove::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CoveForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CovesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCoves::route('/'),
            'create' => CreateCove::route('/create'),
            'edit' => EditCove::route('/{record}/edit'),
        ];
    }
}
