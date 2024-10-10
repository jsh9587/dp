<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsHistory extends Model
{
    use HasFactory;

    protected $table = 'news_history';
    protected $fillable = [
        'news_id',
        'previous_content'
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
