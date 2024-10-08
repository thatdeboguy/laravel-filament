<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BenefitsResource\Pages;
use App\Filament\Resources\BenefitsResource\RelationManagers;
use App\Models\Benefits;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BenefitsResource extends Resource
{
    protected static ?string $model = Benefits::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Resources';

    protected static ?int $navigationSort = 1;
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
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name_tr'),
                Tables\Columns\TextColumn::make('name_en'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\IconColumn::make('is_modifiable')->boolean(),

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
            'index' => Pages\ListBenefits::route('/'),
            'create' => Pages\CreateBenefits::route('/create'),
            'edit' => Pages\EditBenefits::route('/{record}/edit'),
        ];
    }
}
