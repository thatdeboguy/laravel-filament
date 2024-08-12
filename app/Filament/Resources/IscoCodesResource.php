<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IscoCodesResource\Pages;
use App\Filament\Resources\IscoCodesResource\RelationManagers;
use App\Models\IscoCodes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IscoCodesResource extends Resource
{
    protected static ?string $model = IscoCodes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Resources';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required(),                             
                Forms\Components\TextInput::make('name_TR')
                    ->label('Name Turkish')
                    ->required(),
                Forms\Components\TextInput::make('name_EN')
                    ->label('Name English')
                    ->required(),
                Forms\Components\MarkdownEditor::make('descriptionTR')
                    ->label('Description Turkish')
                    ->required()
                    ->columnSpan('full'),
                Forms\Components\MarkdownEditor::make('descriptionEN')
                    ->label('Description English')
                    ->required()
                    ->columnSpan('full'),

                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListIscoCodes::route('/'),
            'create' => Pages\CreateIscoCodes::route('/create'),
            'edit' => Pages\EditIscoCodes::route('/{record}/edit'),
        ];
    }
}
