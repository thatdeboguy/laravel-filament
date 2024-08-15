<?php

namespace App\Filament\Resources\IscoCodesResource\Pages;

use App\Filament\Resources\IscoCodesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIscoCodes extends EditRecord
{
    protected static string $resource = IscoCodesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
