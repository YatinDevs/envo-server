<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('customer_name')
                ->required(),
            Forms\Components\FileUpload::make('image_url') // Replace with FileUpload
                ->label('Customer Image')
                ->image() // Ensures only images can be uploaded
                ->directory('testimonials') // Folder to store the images
                ->preserveFilenames() // Preserve original filenames
                ->required(),
            Forms\Components\TextInput::make('rating')
                ->numeric()
                ->required(),
            Forms\Components\Textarea::make('feedback')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\ImageColumn::make('image_url') // Display the image
                ->label('Customer Image')
                ->disk('public'), // Use the 'public' disk
                Tables\Columns\TextColumn::make('customer_name'),
                Tables\Columns\TextColumn::make('rating'),
                Tables\Columns\TextColumn::make('feedback')->limit(50),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
