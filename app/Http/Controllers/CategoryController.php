<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
class CategoryController extends Controller
{
    public function index(){
        $categories = category::all(); // select * from category
        return view('admin.category',compact('categories'));
    }
    // public function store(Request $request){
    //     // echo "working";
    //     $category = new category;
    //     $category->category_name = $request->catgory_name;
    //     $category->description = $request->description;

    //     $imageFile = $request->file("image");
    //     $image = time().".".$imageFile->getClientOriginalName();
    //     $imageFile->move("c",$image);

    //     $category->image = $image;

    //     $category->save();
        

    // }

    public function addCategory(Request $request){
        // echo "asd";
        $category = new category;  
        $category->category_name = $request->category_name;
        $category->description = $request->description;

        $imageFile = $request->file("image");
        $image = time().".".$imageFile->getClientOriginalName();
        $imageFile->move("c",$image);

        $category->image = $image;

        $category->save(); 
        return redirect()->back()->with("success","category added");
    }
    public function delete($id){
        $category = category::find($id);  // select * from category where id = $id
        // print_r($category);die;
        $category->delete();
        return redirect("showcategory")->with("success","category deleted");
    }
    public function edit($id){
        // echo "asda";die;
        $category = category::find($id);

        return view("admin/editCategory",compact("category"));
    }
    public function update(Request $request, $id){
        // echo $id;die;
        $category = category::find($id);    
        $category->category_name = $request->category_name;
        $category->description = $request->description;

        $imageFile = $request->file("image");
        $image = time().".".$imageFile->getClientOriginalName();
        $imageFile->move("c",$image);

        $category->image = $image;

        $category->update(); 
        return redirect("showcategory");
    }
}
