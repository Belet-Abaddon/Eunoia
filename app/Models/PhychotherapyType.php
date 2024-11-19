<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhychotherapyType extends Model
{
    protected $table = 'phychotherapy_types';
    protected $fillable = ['name', 'description'];

    public function questions():BelongsTo {
        return $this->belongsTo(Question::class);
    }
    use HasFactory;
}
