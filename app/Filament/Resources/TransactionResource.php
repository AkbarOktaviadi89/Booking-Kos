<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Boarding House Managememnt';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('code')
                        ->required()
                        ->maxLength(255),
    
                    Select::make('boarding_house_id')
                        ->label('Boarding House')
                        ->relationship('boardingHouse', 'name') 
                        ->searchable()
                        ->required(),
    
                    Select::make('room_id')
                        ->label('Room')
                        ->relationship('room', 'name') 
                        ->searchable()
                        ->required(),
    
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
    
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
    
                    TextInput::make('phone_number')
                        ->label('Phone Number')
                        ->required()
                        ->maxLength(20),
    
                    Select::make('payment_method')
                        ->options([
                            'down_payment' => 'Down Payment',
                            'full_payment' => 'Full Payment',
                        ])
                        ->required(),
    
                    Select::make('payment_status')
                        ->options([
                            'pending' => 'Pending',
                            'paid' => 'Paid',
                            'failed' => 'Failed',
                        ])
                        ->required(),
    
                    DatePicker::make('start_date')
                        ->required(),
    
                    TextInput::make('duration')
                        ->numeric()
                        ->suffix('days')
                        ->required(),
    
                    TextInput::make('total_amount')
                        ->numeric()
                        ->prefix('IDR')
                        ->required(),
    
                    DatePicker::make('transaction_date')
                        ->label('Transaction Date')
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Transaction Code')
                    ->sortable()
                    ->searchable(),
    
                TextColumn::make('boardingHouse.name')
                    ->label('Boarding House')
                    ->sortable()
                    ->searchable(),
    
                TextColumn::make('room.name')
                    ->label('Room')
                    ->sortable()
                    ->searchable(),
    
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
    
                TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->sortable()
                    ->searchable(),
    
                TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->sortable()
                    ->searchable(),
    
                TextColumn::make('total_amount')
                    ->label('Total Amount')
                    ->sortable()
                    ->searchable(),
    
                TextColumn::make('transaction_date')
                    ->label('Transaction Date')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
