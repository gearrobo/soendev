<?php

namespace App\Filament\Resources\Clients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->square(),

                TextColumn::make('name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable(),

                TextColumn::make('website')
                    ->label('Website')
                    ->limit(30),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}