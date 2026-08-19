<?php

namespace App\Filament\Resources\Portfolios\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->label('Project')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('client')
                    ->searchable(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

            ])
            ->defaultSort('sort_order');
    }
}