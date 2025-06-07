<?php

namespace App\Filament\Resources\EndCategoryResource\Pages;

use App\Filament\Resources\EndCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEndCategories extends ListRecords
{
    protected static string $resource = EndCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
