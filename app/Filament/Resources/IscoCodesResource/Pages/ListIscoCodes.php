<?php

namespace App\Filament\Resources\IscoCodesResource\Pages;

use App\Filament\Resources\IscoCodesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIscoCodes extends ListRecords
{
    protected static string $resource = IscoCodesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
