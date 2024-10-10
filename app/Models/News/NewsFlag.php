<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsFlag extends Model
{
    use HasFactory;

    protected $table = 'news_flag';
    protected $fillable = [
        'type',
        'name'
    ];
}
