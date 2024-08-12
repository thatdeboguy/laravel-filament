<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolsResource\Pages;
use App\Filament\Resources\SchoolsResource\RelationManagers;
use App\Models\Schools;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchoolsResource extends Resource
{
    protected static ?string $model = Schools::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Resources';
    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_tr')
                    ->required(),
                Forms\Components\TextInput::make('name_en')
                    ->required(),
                Forms\Components\Select::make('Country')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name_tr'),
                Tables\Columns\TextColumn::make('name_en'),
                Tables\Columns\TextColumn::make('Country'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                
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
            'index' => Pages\ListSchools::route('/'),
            'create' => Pages\CreateSchools::route('/create'),
            'edit' => Pages\EditSchools::route('/{record}/edit'),
        ];
    }
}
