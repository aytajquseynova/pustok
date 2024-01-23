<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
        $locales = LaravelLocalization::getSupportedLocales();
        $langs = array_keys($locales);

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
    public function edit($id)
{
    $locales = LaravelLocalization::getSupportedLocales();
    $langs = array_keys($locales);

    // Fetch the language line based on the provided $id
    $languageLine = LanguageLine::findOrFail($id);

    return view('admin.languageLine.edit', compact('langs', 'languageLine'));
}


        public function destroy($id)
        {
            $languageLine = LanguageLine::findOrFail($id);
            $languageLine->delete();

            return redirect()->route('admin.languageLine.index')
                ->with('type', 'success')
                ->with('message', 'Language Line has been deleted.');
        }
}
