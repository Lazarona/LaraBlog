<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
