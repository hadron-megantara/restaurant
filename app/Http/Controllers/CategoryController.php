<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        return view("category.list");
    }

    public function getList(Request $request){
        $category = Category::orderBy('updated_at', 'desc')->get();

        return Datatables::of($category)->make();
    }

    public function store(Request $request){
        $category = new Category;
        $category->name = $request->categoryName;
        $category->save();

        return redirect('/category')->with('success', 'Success adding new Category');
    }

    public function update(Request $request){
        $category = Category::find($request->categoryId);
        $category->name = $request->categoryName;
        $category->save();

        return redirect('/category')->with('success', 'Success update Category');
    }

    public function destroy(Request $request){
        $category = Category::find($request->categoryId);
        $category->delete();

        return redirect('/category')->with('success', 'Success remove Category');
    }
}
