<?php

namespace App\Filament\Resources\Entries\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;

class EntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('cove_id')
                    ->label('Cove')
                    ->relationship('cove', 'name')
                    ->required(),
                Select::make('type')
                    ->options([
                        'note' => 'Note',
                        'photo' => 'Photo',
                        'link' => 'Link',
                        'voice' => 'Voice',
                        'song' => 'Song',
                    ])
                    ->required(),
                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255),
                TextArea::make('body')
                    ->label('Body')
                    ->columnSpanFull(),
                TextInput::make('url')
                    ->label('URL')
                    ->url()
                    ->maxLength(255),
                TextInput::make('media_path')
                    ->label('Media Path')
                    ->maxLength(255),
                Select::make('tags')
                    ->label('Tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->unique(),
                    ])
            ]);
    }
}
