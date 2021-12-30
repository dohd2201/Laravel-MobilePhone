<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddproductRequest;
use App\Http\Requests\EditproductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        // $products = DB::table('products')->join("categories", "products.categories_id", "=", "categories.id")->select("products.id", "image", "code", "products.name as products_name", "price", "state", "categories.name as categories_name")->orderBy("products.id", "DESC")->get()->all();
        $products = Product::orderBy("id", "DESC")->paginate(5);
        return view("backend/products/listproduct", ["products"=>$products]);
    }

    public function create(){
        $categories = Category::all()->toArray();
        return view("backend/products/addproduct", ["categories" => $categories]);
        
    }

    public function store(AddproductRequest $AddproductRequest){
        // return view("backend/products/addproduct");
        // dd($AddproductRequest->description);
        
        $product = new Product;
        $product -> name = $AddproductRequest -> name;
        $product -> slug = STR::slug($AddproductRequest->name);
        $product -> code = $AddproductRequest -> code;
        $product -> price = $AddproductRequest -> price;
        $product -> warranty = $AddproductRequest -> warranty;
        $product -> accessories = $AddproductRequest -> accessories;
        $product -> condition = $AddproductRequest -> condition;
        $product -> promotion = $AddproductRequest -> promotion;
        $product -> status = $AddproductRequest -> status;
        $product -> description = $AddproductRequest -> description;
        $product -> featured = $AddproductRequest -> featured;
        $product -> categories_id = $AddproductRequest -> category;
        $filename = $AddproductRequest->image->getClientOriginalName();
        $product->image = $filename;
        $AddproductRequest->image->move(public_path('backend/img'), $filename);
        
        $product->save();
        session()->flash("message","Thêm sản phẩm thành công !");
        return redirect("/admin/product");

    }

    public function edit($id){
        $categories = Category::all()->toArray();
        $product = Product::find($id);

        return view("backend/products/editproduct", ["product" => $product, "categories" => $categories]);
    }

    public function update(EditproductRequest $EditproductRequest, $id){
        $product = new Product;
        $arr['name'] = $EditproductRequest -> name;
        $arr['slug'] = STR::slug($EditproductRequest->name);
        $arr['code'] = $EditproductRequest -> code;
        $arr['price'] = $EditproductRequest -> price;
        $arr['warranty'] = $EditproductRequest -> warranty;
        $arr['accessories'] = $EditproductRequest -> accessories;
        $arr['condition'] = $EditproductRequest -> condition;
        $arr['promotion'] = $EditproductRequest -> promotion;
        $arr['status'] = $EditproductRequest -> status;
        $arr['description'] = $EditproductRequest -> description;
        $arr['featured'] = $EditproductRequest -> featured;
        $arr['categories_id'] = $EditproductRequest -> category;
        $filename = $EditproductRequest->image->getClientOriginalName();
        $arr['image'] = $filename;
  
        $EditproductRequest->image->move(public_path('backend/img'), $filename);
        $product::where("id", $id)->update($arr);
        session()->flash("message","Sửa sản phẩm thành công !");
        return redirect("admin/product");
        
    }

    public function delete($id){
        Product::destroy($id);
        session()->flash("message","Xóa sản phẩm thành công !");
        return back();

    }
}