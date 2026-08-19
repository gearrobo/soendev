<?php

namespace App\Filament\Resources\HomepageSections;

use App\Filament\Resources\HomepageSections\Pages\CreateHomepageSection;
use App\Filament\Resources\HomepageSections\Pages\EditHomepageSection;
use App\Filament\Resources\HomepageSections\Pages\ListHomepageSections;
use App\Filament\Resources\HomepageSections\Pages\ViewHomepageSection;
use App\Filament\Resources\HomepageSections\Schemas\HomepageSectionForm;
use App\Filament\Resources\HomepageSections\Schemas\HomepageSectionInfolist;
use App\Filament\Resources\HomepageSections\Tables\HomepageSectionsTable;
use App\Models\HomepageSection;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomepageSectionResource extends Resource
{
    protected static ?string $model = HomepageSection::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Homepage Sections';

    protected static ?string $modelLabel = 'Homepage Section';

    protected static ?string $pluralModelLabel = 'Homepage Sections';

    public static function form(Schema $schema): Schema
    {
        return HomepageSectionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HomepageSectionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomepageSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepageSections::route('/'),
            'create' => CreateHomepageSection::route('/create'),
            'view' => ViewHomepageSection::route('/{record}'),
            'edit' => EditHomepageSection::route('/{record}/edit'),
        ];
    }
}
