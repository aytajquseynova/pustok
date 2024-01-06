<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;



class Category extends Model
{
use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['title', 'slug', 'tags', 'product_title', 'ex_tax', 'brands', 'product_code', 'reward_points',  'description'];
    public function category(){
        return $this->hasMany(Category::class,'category_id');
    }
    public static function boot(){
        parent::boot();
        static::deleting(function($category){
            $category->category()->delete();
        });
    }
}
