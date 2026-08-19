<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('Service Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('short_description')
                    ->label('Short Description')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(6)
                    ->columnSpanFull(),

                FileUpload::make('icon')
                    ->label('Icon')
                    ->image()
                    ->disk('public')
                    ->directory('services/icons')
                    ->visibility('public'),

                FileUpload::make('image')
                    ->label('Service Image')
                    ->image()
                    ->disk('public')
                    ->directory('services')
                    ->visibility('public')
                    ->imageEditor(),

                TextInput::make('button_text')
                    ->label('Button Text'),

                TextInput::make('button_url')
                    ->label('Button URL'),

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