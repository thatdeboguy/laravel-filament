<?php

namespace App\Filament\Resources\TopCategoryResource\Pages;

use App\Filament\Resources\TopCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopCategory extends EditRecord
{
    protected static string $resource = TopCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
