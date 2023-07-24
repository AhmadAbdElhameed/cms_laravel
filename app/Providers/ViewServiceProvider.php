<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if(!request()->is('admin/*')){
            Paginator::defaultView('vendor.pagination.blog_paginator');

            view()->composer('*',function($view){
                if(!Cache::has('recent_posts')){
                    $recent_posts = Post::with(['category','user','media'])
                        ->whereHas('category',function($query){
                            $query->where('status',1);
                        })
                        ->whereHas('user',function($query){
                            $query->where('status',1);
                        })
                        ->wherePostType('post')->whereStatus(1)->orderBy('id','desc')->limit(5)->get();

                    Cache::remember('recent_posts', 3600,function () use($recent_posts){
                        return $recent_posts;
                    });
                }

                $recent_posts = Cache::get('recent_posts');
                $view->with([
                    'recent_posts' => $recent_posts,
                ]);
            });
        }
    }
}
