<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make([
                    'sm' => 1,
                    'xl' => 2,
                ])->schema([
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
                        ->unique(ignoreRecord: true)
                ]),
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Select::make('state')
                            ->label('State')
                            ->required()
                            ->options([
                                'draft', 'published', 'archive'
                            ])
                            ->default(0),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'title')
                    ]),
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('preview'),
                    ]),
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->nullable()
                            ->maxLength(255),
                    ]),
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\RichEditor::make('body')
                            ->label('Content')
                            ->nullable()
                    ]),
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\TextInput::make('seo_title')
                            ->label('Seo title')
                            ->nullable(),
                        Forms\Components\TextInput::make('seo_keywords')
                            ->label('Seo keywords')
                            ->nullable(),
                        Forms\Components\TextInput::make('seo_title')
                            ->label('Seo description')
                            ->nullable(),
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
                Tables\Columns\TextColumn::make('state')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->since()
                    ->label('Last update')
            ])
            ->defaultSort('name')
            ->filters(
                [
                    Tables\Filters\SelectFilter::make('state')
                        ->options([
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'archive' => 'Archive',
                        ]),
                    TernaryFilter::make('trashed')
                        ->placeholder('Without trashed records')
                        ->trueLabel('With trashed records')
                        ->falseLabel('Only trashed records')
                        ->queries(
                            true: fn(Builder $query) => $query->withTrashed(),
                            false: fn(Builder $query) => $query->onlyTrashed(),
                            blank: fn(Builder $query) => $query->withoutTrashed(),
                        ),
                    Filter::make('created_at')
                        ->form([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\DatePicker::make('created_from'),
                                    Forms\Components\DatePicker::make('created_until'),
                                ])
                        ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['created_from'],
                                    fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                                )
                                ->when(
                                    $data['created_until'],
                                    fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                                );
                        }),
                    Filter::make('updated_at')
                        ->form([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\DatePicker::make('updated_from'),
                                    Forms\Components\DatePicker::make('updated_until'),
                                ])
                        ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['updated_from'],
                                    fn(Builder $query, $date): Builder => $query->whereDate('updated_at', '>=', $date),
                                )
                                ->when(
                                    $data['updated_until'],
                                    fn(Builder $query, $date): Builder => $query->whereDate('updated_at', '<=', $date),
                                );
                        })
                ],
                layout: Tables\Filters\Layout::AboveContent,
            )
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
            'index' => Pages\ManageArticles::route('/'),
        ];
    }
}
