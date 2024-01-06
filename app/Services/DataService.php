<?php

namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataService
{
    // public function __construct(private ImageService $imageServicem, private SimpleService $simple, private ImageService $imageService)
    // {
    // }

    public function sluggable($str)
    {
        return Str::slug($str);
    }

    public function sluggableArray($array, $key)
    {
        // Check if the array key exists in the input array
        if (array_key_exists($key, $array)) {
            $slugs = [];
            // Loop through the array values
            foreach ($array[$key] as $k => $value) {
                $slugs[$k] = $this->sluggable($value);
            }
            return $slugs;
        } else {
            // Handle the case where the key doesn't exist in the array
            return [];
        }
    }




    public function search($model, $name, $q) {
        $locale = app()->getLocale();
        if ($q) {
            $categories = $model::where($name.'->' . $locale, $q)->paginate(10);
        } else {
            $categories = $model::paginate(10);
        }
        return $categories;
    }
}





