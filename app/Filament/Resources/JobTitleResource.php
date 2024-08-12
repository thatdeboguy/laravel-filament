<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobTitleResource\Pages;
use App\Filament\Resources\JobTitleResource\RelationManagers;
use App\Models\JobTitle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobTitleResource extends Resource
{
    protected static ?string $model = JobTitle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Resources';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titleTR')
                    ->required()
                    ->label('Title Turkish'),
                Forms\Components\TextInput::make('titleEN')
                    ->required()
                    ->label('Title English'),
                Forms\Components\TextInput::make('keywordsTR')
                    ->required()
                    ->label('Keyword Turkish'),
                Forms\Components\TextInput::make('keywordsEN')
                    ->required()
                    ->label('Keyword English'),                
                Forms\Components\MarkdownEditor::make('descriptionTR')
                    ->required()
                    ->label('Description Turkish'),
                Forms\Components\MarkdownEditor::make('descriptionEN')
                    ->required()
                    ->label('Description English'),
                Forms\Components\Select::make('isco_id')
                    ->relationship('iscoCodes','code')
                    ->preload(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('iscoCodes.code'),
                Tables\Columns\TextColumn::make('titleTR'),
                Tables\Columns\TextColumn::make('titleEN'),
                Tables\Columns\TextColumn::make('keywordsTR'),
                Tables\Columns\TextColumn::make('keywordsEN'),
                Tables\Columns\TextColumn::make('descriptionTR'),
                Tables\Columns\TextColumn::make('descriptionEN'),
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
            'index' => Pages\ListJobTitles::route('/'),
            'create' => Pages\CreateJobTitle::route('/create'),
            'edit' => Pages\EditJobTitle::route('/{record}/edit'),
        ];
    }
}
