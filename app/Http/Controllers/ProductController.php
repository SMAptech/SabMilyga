<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
class ProductController extends Controller
{
    public function index()
    {
        $products = products::all();
        return view("admin/product",compact('products'));
    }
    public function addProduct(Request $request){
        // echo "asdasdasd";
        $request->validate([
            'product_name' =>'required|max:25',
            'price' =>'required|min:1',
            'quantity' =>'required|min:1',
            'description' =>'required',
            'category' =>'required',
            'image' =>'image'
            
        ]);
        // print_r("asdasd");die;
        $products = new products();
        $products->product_name = $request->product_name;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->description = $request->description;
        $products->category_id = $request->category;

        
        if ($request->hasFile('image')) {
            $imageFile = $request->file("image");
            $image = time().".".$imageFile->getClientOriginalName();
            $imageFile->move("c",$image);
            $products->image = $image;
        }
        // print_r($products);die;
        $products->save();
        return redirect('products');
    }
}
