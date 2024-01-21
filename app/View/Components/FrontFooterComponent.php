<?php

namespace App\View\Components;

use App\Models\Contact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontFooterComponent extends Component
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
        $contacts = Contact::all();
        return view('components.front-footer-component', compact('contacts'));
    }
}
