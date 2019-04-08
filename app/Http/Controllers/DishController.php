<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        return view("dish.dish");
    }

    public function list(Request $request){

    }
}
