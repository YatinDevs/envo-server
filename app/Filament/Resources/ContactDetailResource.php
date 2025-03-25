<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactDetailResource\Pages;
use App\Filament\Resources\ContactDetailResource\RelationManagers;
use App\Models\ContactDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactDetailResource extends Resource
{  
    protected static ?string $navigationGroup = 'Contact Details';

    protected static ?string $model = ContactDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('phone_1')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_2')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('office_address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('branch_address')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('facebook')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('twitter')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('linkedin')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('youtube')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('phone_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('office_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('branch_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListContactDetails::route('/'),
            'create' => Pages\CreateContactDetail::route('/create'),
            'edit' => Pages\EditContactDetail::route('/{record}/edit'),
        ];
    }
}
