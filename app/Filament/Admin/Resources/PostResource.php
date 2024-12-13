<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PostResource\Pages;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('user_id')
                        ->label('User')
                        ->options(User::role('member')->pluck('username', 'id'))
                        ->searchable(),
                    TextInput::make('title')
                        ->live()
                        ->required()
                        ->minLength(1)
                        ->maxLength(150)
                        ->afterStateUpdated(function (string $operation, $state, Set $set) {
                            if ($operation === 'edit') {
                                return;
                            }

                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')
                        ->required()
                        ->minLength(1)
                        ->maxLength(150)
                        ->unique(ignoreRecord: true),
                    RichEditor::make('body')
                        ->required()
                        ->columnSpanFull(),
                ])->columnSpan(2)->columns(2),

                Group::make()->schema([
                    Section::make('Featured Image')->schema([
                        FileUpload::make('image')
                            ->label('')
                            ->disk('public')
                            ->directory('posts')
                            ->required(),
                    ]),
                    Section::make()->schema([
                        DatePicker::make('published_at')
                            ->required(),
                        Toggle::make('featured'),
                    ]),
                    Section::make('Meta')->schema([

                        Select::make('category_id')
                            ->label('Category')
                            ->options(Category::all()->pluck('name', 'id'))
                            ->required()
                            ->searchable(),
                    ]),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('author.username')
                    ->sortable(),
                TextColumn::make('title')
                    ->sortable(),
                TextColumn::make('slug')
                    ->sortable(),
                TextColumn::make('published_at')
                    ->sortable(),
                IconColumn::make('featured')
                    ->sortable()
                    ->boolean(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
