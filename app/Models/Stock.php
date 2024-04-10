<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Support\Str;

class Stock extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['title', 'main', 'seo_title', 'seo_subtitle', 'seo_keywords'];
    public static function boot(){
        parent::boot();

        self::creating(function($model){
            $slug = Str::slug($model->title);
            $model->slug = Stock::where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });

        self::updating(function($model){
            $slug = Str::slug($model->title);
            $model->slug = Stock::where('slug', '!=', $model->slug)->where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    }
}
