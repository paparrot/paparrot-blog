<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->reactive()
                    ->afterStateUpdated(function (\Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'default' => 'Default',
                                'archive' => 'Archive',
                                'custom' => 'Custom'
                            ])
                            ->reactive(),
                    ]),
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('preview'),
                        Forms\Components\Textarea::make('description')
                            ->required(),
                        Forms\Components\Textarea::make('body')
                            ->hidden(fn(Closure $get): bool => $get('type') !== 'custom'),
                        Forms\Components\RichEditor::make('body')
                            ->hidden(fn(Closure $get): bool => $get('type') !== 'default'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('preview'),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->since()
                    ->label('Last update')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePages::route('/'),
        ];
    }
}
