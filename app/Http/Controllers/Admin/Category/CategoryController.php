<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy("name", "ASC")->get()->toArray();
        return view("backend/categories/category", ["categories" => $categories]);
    }

    public function store(CategoryRequest $CategoryRequest){
        $category = new Category;
        $category -> name = $CategoryRequest -> name;
        $category -> slug = Str::slug($CategoryRequest->name);  
        $category->save();
        session()->flash("message","Thêm danh mục thành công !");
        return redirect("/admin/category");

    }

    public function edit($id){
        $category = Category::find($id);
        return view("backend/categories/editcategory", ["category" => $category]);
    }

    public function update(CategoryRequest $CategoryRequest, $id){
        $category = Category::find($id);
        $category -> name = $CategoryRequest -> name;
        $category -> slug = Str::slug($CategoryRequest->name);  
        $category->save();
        session()->flash("message","Sửa danh mục thành công !");
        return redirect("/admin/category");

    }

    public function delete($id){
        Category::destroy($id);
        session()->flash("message","Xóa danh mục thành công !");
        return redirect("admin/category");
    }
}