<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Filament\Resources\KategoriResource\RelationManagers;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'carbon-data-categorical';
    

    protected static function getNavigationLabel(): string
    {
        return "Kategori";
    }

    public static function getPluralLabel(): string
    {
        return "Kategori";
    }

    protected static ?string $navigationGroup = 'Blog Management';

    protected static ?string $slug = 'blog/kategori';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->label('Nama')
                ->required(),

                Forms\Components\DatePicker::make('tanggal')
                ->label('Tanggal')
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->searchable(),

                Tables\Columns\TextColumn::make('tanggal')
                ->label('Nama')
                ->dateTime()


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
            'index' => Pages\ManageKategoris::route('/'),
        ];
    }    
}
