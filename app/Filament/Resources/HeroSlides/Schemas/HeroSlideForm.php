<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->maxLength(255),

                Textarea::make('content')
                    ->label('Description')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Hero Image')
                    ->image()
                    ->disk('public')
                    ->directory('hero-slides')
                    ->visibility('public')
                    ->required()
                    ->imageEditor()
                    ->columnSpanFull(),

                TextInput::make('button_text')
                    ->label('Button Text')
                    ->maxLength(255),

                TextInput::make('button_url')
                    ->label('Button URL')
                    ->placeholder('#services'),

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