<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("name"),
                TextInput::make("slug"),
                Textarea::make("description")->columnSpanFull(),
                TextInput::make("price"),
                TextInput::make("old_price"),
                TextInput::make("top_category_id"),
                TextInput::make("mid_category_id"),
                TextInput::make("end_category_id"),
                TextInput::make("color_id"),
                TextInput::make("size_id"),
                Checkbox::make("isOffered"),
                Checkbox::make("active"),
                FileUpload::make("image"),

            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id"),
                TextColumn::make("name"),
                TextColumn::make("slug"),
                TextColumn::make("price"),
                TextColumn::make("old_price"),
                TextColumn::make("topCategories.top_category"),
                TextColumn::make("midCategories.mid_category"),
                TextColumn::make("endCategories.end_category"),
                TextColumn::make("color_id"),
                TextColumn::make("size_id"),
                TextColumn::make("isOffered"),
                TextColumn::make("active"),
                TextColumn::make("size_id"),
                TextColumn::make("description"),
                TextColumn::make("created_at"),
                TextColumn::make("image"),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
