<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\MainController as BaseController;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoriesController extends BaseController
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$categories = Category::all();
return $this->sendResponse(CategoryResource::collection($categories), 'Categories retrieved successfully.');
}
}