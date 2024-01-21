<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
        public function index()
    {
        $contacts = Contact::paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

        public function store(Request $request)
    {

        $request->validate([
            'phone1' => 'required',
            'phone2' => 'required',
            'phone3' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        $contact = new Contact([
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'phone3' => $request->input('phone3'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),

        ]);

        $contact->save();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact created successfully.');
    }

        public function edit(string $id)
    {
        $contacts = Contact::findOrFail($id);

        return view('admin.contacts.edit', compact('contacts'));
    }
    public function destroy(string $id)
    {
        $contacts = Contact::findOrFail($id);
        $deleted = $contacts->delete();
        if ($deleted) {
            return redirect()->route('admin.contacts.index');
        } else {
            return back()->with('error', 'Error occurred while deleting contact details.');
        }
    }
}
