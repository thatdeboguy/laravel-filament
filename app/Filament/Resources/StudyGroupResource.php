<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyGroupResource\Pages;
use App\Filament\Resources\StudyGroupResource\RelationManagers;
use App\Models\StudyGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudyGroupResource extends Resource
{
    protected static ?string $model = StudyGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static ?string $navigationGroup = 'Resources';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title_tr')
                    ->required()
                    ->label('Title Turkish'),
                Forms\Components\TextInput::make('title_en')
                    ->required()
                    ->label('Title English'),
                Forms\Components\MarkdownEditor::make('description_tr')
                    ->required()
                    ->label('description Turkish'),
                Forms\Components\MarkdownEditor::make('description_en')
                    ->required()
                    ->label('description English'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title_tr'),
                Tables\Columns\TextColumn::make('title_en'),
                Tables\Columns\TextColumn::make('description_tr'),
                Tables\Columns\TextColumn::make('description_en'),
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
            'index' => Pages\ListStudyGroups::route('/'),
            'create' => Pages\CreateStudyGroup::route('/create'),
            'edit' => Pages\EditStudyGroup::route('/{record}/edit'),
        ];
    }
}
