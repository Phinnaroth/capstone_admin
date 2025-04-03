<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{
    use HasFactory;

    protected $table = 'answeroptions'; // Specify the table name

    protected $primaryKey = 'OptionID'; // Specify the primary key

    public $timestamps = false; // No created_at or updated_at columns

    protected $fillable = [
        'QuestionID',
        'OptionText',
        'SkinTypeEffect',
        'SeverityEffect',
        'Score',
    ];

    // Relationships with other models
    public function questions()
    {
        return $this->belongsTo(Question::class, 'QuestionID', 'QuestionID');
    }
}