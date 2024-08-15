<?php

namespace App\Filament\Resources\FieldOfStudyResource\Pages;

use App\Filament\Resources\FieldOfStudyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFieldOfStudy extends EditRecord
{
    protected static string $resource = FieldOfStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
