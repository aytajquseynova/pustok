<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function images(){
        return $this->hasMany(Images::class, 'product_id');
    }

    public function getMainImage($images) {
        foreach($images as $image) {
          if($image->is_main == 1) {
            return $image->img;
          }
        }
    }

    public function main_image($images){
      if($images){
        foreach($images as $image){
          if($image->is_main){
            return $image->img;
          }
        }
      }
    }

}
