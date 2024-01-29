<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function edit()
    {
        // Fetch the user's current address details and display the form
        return view('edit-address');
    }

    public function update(Request $request)
    {
       $data = $request->all();
       dd($data);
        // Save the changes to the database

        // Redirect back with a success message
        return redirect()->route('edit.address')->with('success', 'Address updated successfully!');
    }
}
