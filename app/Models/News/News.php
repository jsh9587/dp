<?php

namespace App\Models\News;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = [
        'type_id', 'level_id',  'name', 'flag1_id', 'flag2_id',
         'title', 'list_title', 'sub_title', 'content','author_id'
    ];

    public function type()
    {
        return $this->belongsTo(NewsType::class, 'type_id','id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id','id');
    }

    public function status()
    {
        return $this->belongsTo(NewsStatus::class, 'status_id','id');
    }

    public function level()
    {
        return $this->belongsTo(NewsLevel::class, 'level_id','id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_category', 'news_id', 'category_id');
    }
    public function hashtags()
    {
        return $this->hasMany(NewsHashTag::class, 'news_id'); // Adjusted for 1:N relationship
    }

    public function history()
    {
        return $this->hasMany(NewsHistory::class, 'news_id');
    }
}
