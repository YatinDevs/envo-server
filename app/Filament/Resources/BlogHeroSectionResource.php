<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogHeroSectionResource\Pages;
use App\Filament\Resources\BlogHeroSectionResource\RelationManagers;
use App\Models\BlogHeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogHeroSectionResource extends Resource
{
    protected static ?string $model = BlogHeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    Forms\Components\TextInput::make('title')->required(),
                    Forms\Components\FileUpload::make('image_url')
                        ->image()
                        ->directory('blog_hero')
                        ->preserveFilenames()
                        ->required(),
                    Forms\Components\Textarea::make('description')->required(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')->label('Image')->disk('public'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description')->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBlogHeroSections::route('/'),
            'create' => Pages\CreateBlogHeroSection::route('/create'),
            'edit' => Pages\EditBlogHeroSection::route('/{record}/edit'),
        ];
    }
}
