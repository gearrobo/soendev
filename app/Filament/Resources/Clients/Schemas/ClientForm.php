<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('Client Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                FileUpload::make('logo')
                    ->label('Client Logo')
                    ->image()
                    ->disk('public')
                    ->directory('clients')
                    ->visibility('public')
                    ->imageEditor(),

                Textarea::make('short_description')
                    ->label('Short Description')
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(6)
                    ->columnSpanFull(),

                TextInput::make('website')
                    ->label('Website')
                    ->url()
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->required(),

                TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}