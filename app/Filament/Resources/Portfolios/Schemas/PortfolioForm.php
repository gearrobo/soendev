<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('Project Title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('category')
                    ->label('Category')
                    ->placeholder('Software / IoT / AI / Hardware'),

                TextInput::make('client')
                    ->label('Client'),

                TextInput::make('short_description')
                    ->label('Short Description')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Project Description')
                    ->rows(8)
                    ->columnSpanFull(),

                FileUpload::make('featured_image')
                    ->label('Featured Image')
                    ->image()
                    ->disk('public')
                    ->directory('portfolio')
                    ->visibility('public')
                    ->imageEditor(),

                TextInput::make('project_url')
                    ->label('Project URL')
                    ->url()
                    ->placeholder('https://example.com'),

                TextInput::make('button_text')
                    ->label('Button Text')
                    ->default('View Project'),

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