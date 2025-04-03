<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients'; // Specify the table name

    protected $primaryKey = 'IngredientID'; // Specify the primary key

    public $timestamps = false; // If you don't have created_at and updated_at columns

    protected $fillable = [
        'IngredientName',
        'SkinTypeEffect',
        'AcneEffect',
        'DarkSpotsEffect',
        'LargePoresEffect',
        'Description',
    ];
}