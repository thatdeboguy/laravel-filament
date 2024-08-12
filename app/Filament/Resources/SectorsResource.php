<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectorsResource\Pages;
use App\Filament\Resources\SectorsResource\RelationManagers;
use App\Models\Sectors;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectorsResource extends Resource
{
    protected static ?string $model = Sectors::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Resources';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_tr')
                    ->required(),
                Forms\Components\TextInput::make('name_en')
                    ->required(),
                Forms\Components\MarkdownEditor::make('description')
                    ->required(),
                Forms\Components\Section::make('status')
                    ->schema([
                        Forms\Components\Toggle::make('is_modifiable'),
                    ]),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Colums\TextColumn::make('name_tr'),
                Tables\Colums\TextColumn::make('name_en'),
                Tables\Colums\TextColumn::make('description'),
                Tables\Colums\IconColumn::make('is_modifiable')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSectors::route('/'),
            'create' => Pages\CreateSectors::route('/create'),
            'edit' => Pages\EditSectors::route('/{record}/edit'),
        ];
    }
}
