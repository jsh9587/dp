<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPublish extends Model
{
    use HasFactory;
    protected $table = 'news_publish';
    protected $fillable = [
        'user_id',
        'published_at'
    ];
}
