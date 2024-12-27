<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['question', 'description', 'phychotherapy_type_id'];

    // In Question Model
    public function phychotherapyType()
    {
        return $this->belongsTo(PhychotherapyType::class);
    }

    use HasFactory;
}
