<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory , Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        // TODO: Implement sluggable() method.
        return [
            'slug' =>[
                'source' => 'name'
            ]
        ];
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
