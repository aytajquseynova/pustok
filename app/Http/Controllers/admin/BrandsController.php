<?php 

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\DataService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BrandsController extends Controller
{
    public function __construct(private DataService $data)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(10);

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = (bool)$request->status;
        $data['slug'] = $this->data->sluggableArray($data, 'title');
      
        $created = Brand::create($data);

        if ($created) {
            return redirect()->route('admin.brands.index');
        } else {
            return back()->with('error', 'Error occurred while creating brand.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logic for showing a specific brand goes here
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
     
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
    
        $data['status'] = (bool)$request->status;
        $data['slug'] = $this->data->sluggableArray($data, 'title');
        $brand = Brand::findOrFail($id);
        $updated = $brand->update($data);
        if ($updated) {
            return redirect()->route('admin.brands.index');
        } else {
            return back()->with('error', 'Error occurred while updating brand.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $deleted = $brand->delete();
        if ($deleted) {
            return redirect()->route('admin.brands.index');
        } else {
            return back()->with('error', 'Error occurred while deleting brand.');
        }
    }
}
