<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Support\Str;

class Tarif extends Model
{
    use HasFactory;
    use Translatable;
    public function category()
    {
        // belongsTo связывает эту модель с моделью Category
        return $this->belongsTo(TarifCategory::class);
    }
    protected $translatable = ['type', 'main', 'subtitle', 'seo_title', 'seo_subtitle', 'seo_keywords'];
    public static function boot(){
        parent::boot();

        self::creating(function($model){
            $slug = Str::slug($model->type);
            $model->slug = Tarif::where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });

        self::updating(function($model){
            $slug = Str::slug($model->type);
            $model->slug = Tarif::where('slug', '!=', $model->slug)->where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    }
}
