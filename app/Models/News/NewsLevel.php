<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLevel extends Model
{
    use HasFactory;

    protected $table = 'news_level';
    protected $fillable = [
        'name'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
