<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                FileUpload::make('featured_image')
                    ->label('Gambar Utama')
                    ->image()
                    ->disk('public')
                    ->directory('blog')
                    ->imageEditor()
                    ->columnSpanFull(),

                TextInput::make('excerpt')
                    ->label('Ringkasan')
                    ->maxLength(500)
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->label('Isi Artikel')
                    ->required()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('blog/content')
                    ->columnSpanFull(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->required(),

                DateTimePicker::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->seconds(false)
                    ->default(now()),
            ]);
    }
}
