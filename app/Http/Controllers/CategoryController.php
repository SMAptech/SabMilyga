<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
class CategoryController extends Controller
{
    public function index(){
        return view('admin.category');
    }
    public function store(Request $request){
        // echo "working";
        $category = new category;
        $category->category_name = $request->catgory_name;
        $category->description = $request->description;

        $imageFile = $request->file("image");
        $image = time().".".$imageFile->getClientOriginalName();
        $imageFile->move("category/images",$image);

        $category->image = $image;

        $category->save();
        

    }
}
