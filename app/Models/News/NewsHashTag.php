<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsHashTag extends Model
{
    use HasFactory;

    protected $table = 'news_hash_tag';
    protected $fillable = [
        'news_id',
        'hash_tag',
    ];
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id'); // Establishing the 1:N relationship
    }
}
