<?php

namespace App\Filament\Resources\BlogHeroSectionResource\Pages;

use App\Filament\Resources\BlogHeroSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogHeroSections extends ListRecords
{
    protected static string $resource = BlogHeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
