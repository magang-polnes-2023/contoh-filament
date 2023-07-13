<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use App\Models\Kategori;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\FormsComponent;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\TablesServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 3;

    protected static function getNavigationLabel(): string
    {
        return "Blog";
    }

    public static function getPluralLabel(): string
    {
        return "Blog";
    }

    protected static ?string $navigationGroup = 'Blog Management';

    protected static ?string $slug = 'blog/blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kategori_id')
                ->label('Kategori')
                ->relationship('kategori', 'nama')
                ->required(),

                Forms\Components\Select::make('author_id')
                ->label('Author')
                ->relationship('author', 'nama')
                ->required(),

                Forms\Components\TextInput::make('judul')
                ->label('Judul')
                ->required(),

                Forms\Components\RichEditor::make('konten')
                ->label('Konten')
                ->columnSpanFull(),

                Forms\Components\DateTimePicker::make('tanggal')
                ->label('Tanggal')
                ->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori.nama'),
                Tables\Columns\TextColumn::make('author.nama'),
                Tables\Columns\TextColumn::make('judul'),
                Tables\Columns\TextColumn::make('tanggal')
                ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }    
}
