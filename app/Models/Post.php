<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Search;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model
{
    use HasFactory , Sluggable;

//    protected $guarded = [];
    protected $fillable = ['title', 'slug', 'description', 'status', 'post_type',
                'comment_able',
                'user_id',
                'category_id'];

    public function sluggable(): array
    {
        // TODO: Implement sluggable() method.
        return [
            'slug' =>[
                'source' => 'title'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function approved_comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class)->where('status',1);
    }

    public function media(){
        return $this->hasMany(PostMedia::class);
    }


}
