<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                ImageEntry::make('logo')
                    ->label('Logo')
                    ->disk('public'),

                TextEntry::make('name')
                    ->label('Client Name'),

                TextEntry::make('slug'),

                TextEntry::make('short_description')
                    ->label('Short Description'),

                TextEntry::make('description')
                    ->label('Description'),

                TextEntry::make('website')
                    ->label('Website'),

                TextEntry::make('is_active')
                    ->label('Active')
                    ->badge(),

                TextEntry::make('sort_order')
                    ->label('Sort Order'),
            ]);
    }
}