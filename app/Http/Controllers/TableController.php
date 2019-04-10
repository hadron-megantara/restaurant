<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Table;
use App\Floor;
use App\Area;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $area = Area::all();
        $floor = Floor::all();

        $data = array(
            'area' => $area,
            'floor' => $floor
        );
        return view("table.list", $data);
    }

    public function getList(Request $request){
        $table = Table::join('areas', 'tables.area_id','=','areas.id')->join('floors', 'table.floor_id','=')
                ->select('tablees.id', 'tables.name', 'categories.id as categoryId', 'categories.name as categoryName')->orderBy('tablees.updated_at')->get();

        return Datatables::of($table)->make();
    }

    public function store(Request $request){
        $table = new Table;
        $table->name = $request->tableName;
        $table->category_id = $request->tableCategoryId;
        $table->save();

        return redirect('/table')->with('success', 'Success adding new Table');
    }

    public function update(Request $request){
        $table = Table::find($request->tableId);
        $table->name = $request->tableName;
        $table->category_id = $request->tableCategoryId;
        $table->save();

        return redirect('/table')->with('success', 'Success update Table');
    }

    public function destroy(Request $request){
        $table = Table::find($request->tableId);
        $table->delete();

        return redirect('/table')->with('success', 'Success remove Table');
    }
}
