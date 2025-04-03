<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions'; // Specify the table name

    protected $primaryKey = 'QuestionID'; // Specify the primary key

    public $timestamps = false; // No created_at or updated_at columns

    protected $fillable = [
        'QuestionText',
        'Category',
    ];

    // Relationships with other models (if any)
    public function answeroptions()
    {
        return $this->hasMany(AnswerOption::class, 'QuestionID', 'QuestionID');
    }
}