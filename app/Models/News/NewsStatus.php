<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsStatus extends Model
{
    use HasFactory;

    protected $table = 'news_status';
    protected $fillable = [
        'name'
    ];


    public function news()
    {
        return $this->hasMany(News::class);
    }
}
