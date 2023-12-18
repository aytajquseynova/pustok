<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;


class LanguageLineController extends Controller
{
    public function index()
    {
        $data = LanguageLine::all();
        return view('admin.languageLine.index', compact('data'));
    }

    public function create()
    {
        $langs = LanguageLine::all();
        return view('admin.languageLine.create', compact('langs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'text' => 'required|array',
        ]);

        LanguageLine::create([
            'group' => $request->group,
            'key' => $request->key,
            'text' => $request->text,
        ]);

        return back()
            ->with('type', 'success')
            ->with('message', 'Language Line has been stored.');
    }
}
