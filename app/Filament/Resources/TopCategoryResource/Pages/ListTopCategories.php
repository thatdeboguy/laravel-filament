<?php

namespace App\Filament\Resources\TopCategoryResource\Pages;

use App\Filament\Resources\TopCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopCategories extends ListRecords
{
    protected static string $resource = TopCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
