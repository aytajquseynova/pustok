<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        $subscription = Subscription::create([
            'email' => $validatedData['email'],
        ]);

        // Abone olma başarılı mesajı veya yönlendirme burada yapılabilir
        return redirect()->back()->with('success', 'Subscription successful!');
    }
}
