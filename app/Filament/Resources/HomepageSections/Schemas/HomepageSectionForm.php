<?php

namespace App\Filament\Resources\HomepageSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomepageSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('section_key')
                    ->required(),
                TextInput::make('title')
                    ->default(null),
                TextInput::make('subtitle')
                    ->default(null),
                Textarea::make('content')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('button_text')
                    ->default(null),
                TextInput::make('button_url')
                    ->url()
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
