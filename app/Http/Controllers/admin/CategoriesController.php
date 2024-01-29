<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\CategoriesRequest;
use App\Models\Category;
use App\Services\DataService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(private DataService $data){

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::paginate(10);

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::where('category_id', 0)->get();
        return view('admin.categories.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        $data=$request->all();
        $data['status']=(bool)$request->status;
        $sluggableData = [
            'title' => $data['title'],
        ];

        // Call the DataService method to generate slugs for the array
        $data['slug'] = $this->data->sluggableArray($sluggableData, 'title');
        $created=Category::create($data);

        if($created){
            return redirect()->route('admin.categories.index');
        }
        else{
            dd('error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findOrFail($id);
        $categories=Category::where('category_id', 0)->get();
        return view('admin.categories.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, string $id)
    {
        $data=$request->all();
        $data['status']= (bool)$request->status;


        $sluggableData = [
            'title' => $data['title'],
        ];

        // Call the DataService method to generate slugs for the array
        $data['slug'] = $this->data->sluggableArray($sluggableData, 'title');
        $category=Category::findOrFail($id);
        $updated=$category->update($data);
        if($updated){
            return redirect()->route('admin.categories.index');
        }else{
            dd('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= Category::findOrFail($id);
        $deleted=$category->delete();
        if($deleted){
            return redirect()->route('admin.categories.index');
        }else{
            dd('error');
        }
    }
}
