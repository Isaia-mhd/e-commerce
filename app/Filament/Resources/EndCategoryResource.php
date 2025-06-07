<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EndCategoryResource\Pages;
use App\Filament\Resources\EndCategoryResource\RelationManagers;
use App\Models\EndCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EndCategoryResource extends Resource
{
    protected static ?string $model = EndCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Categories-End';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("end_category")->required(),
                TextInput::make("slug")->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id"),
                TextColumn::make("end_category"),
                TextColumn::make("slug"),
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
            'index' => Pages\ListEndCategories::route('/'),
            'create' => Pages\CreateEndCategory::route('/create'),
            'edit' => Pages\EditEndCategory::route('/{record}/edit'),
        ];
    }
}
