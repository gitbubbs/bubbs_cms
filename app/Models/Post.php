<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function paragraphs(): HasMany
    {
        return $this->hasMany(Paragraph::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    // public function categories(): HasMany
    // {
        
    // }

    // public function tags(): HasMany
    // {

    // }
}
