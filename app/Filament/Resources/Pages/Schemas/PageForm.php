<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('subtitle')
                    ->maxLength(255),

                RichEditor::make('content')
                    ->columnSpanFull(),

                FileUpload::make('featured_image')
                    ->image()
                    ->directory('pages')
                    ->disk('public'),

                Toggle::make('is_active')
                    ->default(true)
                    ->required(),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->required(),

            ]);
    }
}