<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    use HasFactory;

    protected $table = 'news_type';
    protected $fillable = [
        'name'
    ];
    public function news()
    {
        return $this->hasMany(News::class,'type_id','id');
    }
}
