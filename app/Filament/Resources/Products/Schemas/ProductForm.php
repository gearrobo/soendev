<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('Product Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('category')
                    ->label('Category')
                    ->placeholder('IoT / Software / Hardware / AI'),

                TextInput::make('short_description')
                    ->label('Short Description')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(8)
                    ->columnSpanFull(),

                FileUpload::make('featured_image')
                    ->label('Product Image')
                    ->image()
                    ->disk('public')
                    ->directory('products')
                    ->visibility('public')
                    ->imageEditor(),

                TextInput::make('product_url')
                    ->label('Product URL')
                    ->url(),

                TextInput::make('button_text')
                    ->label('Button Text')
                    ->default('Learn More'),

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