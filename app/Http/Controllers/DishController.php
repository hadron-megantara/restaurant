<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

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
        if(!$request->has('dateFrom') || $request->dateFrom == ''){
            $dateFrom = '1990-01-01';
        } else{
            $dateFrom = $request->dateFrom;
        }

        if(!$request->has('dateTo') || $request->dateTo == ''){
            $dateTo = date('Y-m-d');
        } else{
            $dateTo = $request->dateTo;
        }

        if($request->has('status')){
            if($request->status != 2){
                $status = $request->status;
                $material = Material::join('material_transactions', 'material_transactions.id', '=', 'materials.transaction_id')->join('colors', 'materials.color_id', '=', 'colors.id')->selectRaw('materials.id, materials.material_type, materials.length, colors.name as color, colors.id as color_id, materials.price, materials.status, material_transactions.date_purchase')->orderBy('materials.updated_at', 'desc')->where('materials.status', $request->status)->whereBetween('material_transactions.date_purchase', [new Carbon($dateFrom), new Carbon($dateTo)])->get();
            } else{
                $material = Material::join('material_transactions', 'material_transactions.id', '=', 'materials.transaction_id')->join('colors', 'materials.color_id', '=', 'colors.id')->selectRaw('materials.id, materials.material_type, materials.length, materials.color, materials.price, materials.status, material_transactions.date_purchase, colors.name as color, colors.id as color_id')->orderBy('materials.updated_at', 'desc')->whereBetween('material_transactions.date_purchase', [new Carbon($dateFrom), new Carbon($dateTo)])->get();
            }
        } else{
            $material = Material::join('material_transactions', 'material_transactions.id', '=', 'materials.transaction_id')->join('colors', 'materials.color_id', '=', 'colors.id')->selectRaw('materials.id, materials.material_type, materials.length, materials.color, materials.price, materials.status, material_transactions.date_purchase, colors.name as color, colors.id as color_id')->orderBy('materials.updated_at', 'desc')->whereBetween('material_transactions.date_purchase', [new Carbon($dateFrom), new Carbon($dateTo)])->get();
        }

        return Datatables::of($material)->make();
    }
}
