<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                ImageEntry::make('featured_image')
                    ->label('Product Image')
                    ->disk('public'),

                TextEntry::make('name')
                    ->label('Product Name'),

                TextEntry::make('slug'),

                TextEntry::make('category'),

                TextEntry::make('short_description')
                    ->label('Short Description'),

                TextEntry::make('description')
                    ->label('Description'),

                TextEntry::make('product_url')
                    ->label('Product URL'),

                TextEntry::make('button_text')
                    ->label('Button'),

                TextEntry::make('is_active')
                    ->label('Active')
                    ->badge(),

                TextEntry::make('sort_order')
                    ->label('Sort Order'),

            ]);
    }
}