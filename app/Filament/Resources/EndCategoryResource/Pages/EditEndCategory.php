<?php

namespace App\Filament\Resources\EndCategoryResource\Pages;

use App\Filament\Resources\EndCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEndCategory extends EditRecord
{
    protected static string $resource = EndCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
