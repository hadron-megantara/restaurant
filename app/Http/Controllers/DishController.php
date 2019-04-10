<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Dish;
use App\Category;

class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $category = Category::all();

        $data = array(
            'category' => $category
        );
        return view("dish.list", $data);
    }

    public function getList(Request $request){
        $dish = Dish::join('categories', 'dishes.category_id','=','categories.id')
                ->select('dishes.id', 'dishes.name', 'categories.id as categoryId', 'categories.name as categoryName')->orderBy('dishes.updated_at')->get();

        return Datatables::of($dish)->make();
    }

    public function store(Request $request){
        $dish = new Dish;
        $dish->name = $request->dishName;
        $dish->category_id = $request->dishCategoryId;
        $dish->save();

        return redirect('/dish')->with('success', 'Success adding new Dish');
    }

    public function update(Request $request){
        $dish = Dish::find($request->dishId);
        $dish->name = $request->dishName;
        $dish->category_id = $request->dishCategoryId;
        $dish->save();

        return redirect('/dish')->with('success', 'Success update Dish');
    }

    public function destroy(Request $request){
        $dish = Dish::find($request->dishId);
        $dish->delete();

        return redirect('/dish')->with('success', 'Success remove Dish');
    }
}
