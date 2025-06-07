<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MidCategoryResource\Pages;
use App\Filament\Resources\MidCategoryResource\RelationManagers;
use App\Models\MidCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MidCategoryResource extends Resource
{
    protected static ?string $model = MidCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Categories-Mid';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("mid_category")->required(),
                TextInput::make("slug")->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("mid_category"),
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
            'index' => Pages\ListMidCategories::route('/'),
            'create' => Pages\CreateMidCategory::route('/create'),
            'edit' => Pages\EditMidCategory::route('/{record}/edit'),
        ];
    }
}
