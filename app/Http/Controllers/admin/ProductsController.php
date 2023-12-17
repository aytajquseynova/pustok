<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function index(){
        $products=Products::with('images')->get();
        return view('admin.products.index',compact('products'));
    }

    public function create(){
        return view('admin.products.create');   
    }
    public function store(Request $request){
        $created=Products::create($request->all());
        $extension=$request->main_image->getClientOriginalExtension();
        $randomName=Str::random(10);
        $lastPath='storage/products/' . $randomName . "." . $extension;
        $request->main_image->storeAs('products', $randomName . "." . $extension, 'public');
        $updated=$created->update(['main_image'=>$lastPath]);
        if($updated){
            return redirect()->route('admin.products.index');
        }
    }
    public function products_add_image($id){
        return view('admin.product_images.create', compact('id'));
    }

    public function products_store_image(Request $request, $id){
        $created = Images::create(['product_id'=> $id]);
        $extension = $request->img->getClientOriginalExtension();
        $randomName = Str::random(10);
        $lastPath = 'storage/products_images/' .$randomName . "." . $extension;
        $request->img->storeAs('products_images', $randomName . "." . $extension, 'public');
        $updated = $created->update(['img'  => $lastPath]);
        if($updated) {
            return redirect()->route('admin.products.index');
        }

}
    public function product_images($id){
        $images=Images::where('product_id', $id)->get();
        return view('admin.product_images.index',compact('images','id'));
    }

    public function add_main_image($id, $product_id){
        $findedImages=Images::where('product_id', $product_id);
        $updated=$findedImages->update(['is_main'=>0]);
        if($updated){
            $image=Images::findOrFail($id);
            $reupdated=$image->update(['is_main'=>1]);
            if($reupdated){
            return redirect()->back();
        }
        }
}
}