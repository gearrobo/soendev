<?php

namespace App\Filament\Resources\HomepageSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomepageSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('section_key')
                    ->label('Section')
                    ->options([
                        'hero'      => 'Hero',
                        'about'     => 'About / Profile',
                        'services'  => 'Services',
                        'products'  => 'Our Products',
                        'portfolio' => 'Portfolio',
                        'clients'   => 'Our Clients',
                        'contact'   => 'Contact',
                    ])
                    ->required()
                    ->native(false),

                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255),

                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->maxLength(255),

                Textarea::make('content')
                    ->label('Content')
                    ->rows(8)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->disk('public')
                    ->directory('homepage')
                    ->imageEditor(),

                TextInput::make('button_text')
                    ->label('Button Text')
                    ->maxLength(255),

                TextInput::make('button_url')
                    ->label('Button URL')
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->required(),

                TextInput::make('sort_order')
                    ->label('Order')
                    ->numeric()
                    ->default(0)
                    ->required(),

            ]);
    }
}