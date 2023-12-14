<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontHeaderComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::with('category')->where('category_id',0)->where('status',1)->get();
        // dd($categories);
        return view('components.front-header-component',compact('categories'));
    }
}
