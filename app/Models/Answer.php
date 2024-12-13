<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['user_id', 'phychotherapy_type_id', 'answer1','answer2','answer3','answer4','answer5','answer6','answer7','answer8','answer9','answer10','percentage'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function phycholochery_type() {
        return $this->hasMany(PhychotherapyType::class);
    }
    use HasFactory;
}
