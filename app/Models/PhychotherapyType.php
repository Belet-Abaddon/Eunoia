<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhychotherapyType extends Model
{
    protected $table = 'phychotherapy_types';
    protected $fillable = ['name', 'description'];

    // In PhychotherapyType Model
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    use HasFactory;
}
