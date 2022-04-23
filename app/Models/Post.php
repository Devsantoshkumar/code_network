<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
         'categroy_id',
         'name',
         'slug',
         'description',
         'yt_frame',
         'meta_title',
         'meta_description',
         'meta_keywords',
         'status',
         'created_by'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'categroy_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id','id');
    }
}
