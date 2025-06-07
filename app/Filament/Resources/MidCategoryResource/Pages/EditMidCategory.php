<?php

namespace App\Filament\Resources\MidCategoryResource\Pages;

use App\Filament\Resources\MidCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMidCategory extends EditRecord
{
    protected static string $resource = MidCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
