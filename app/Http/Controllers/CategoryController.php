<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $fillable = ['name'];

    public function AjaxStore(Request $request)
    {
        $name = ($request->input('name'));
        $data = Category::create(['name'=>$name]);
        return Response()->json(['id'=>$data->id,'name'=>$data->name],200);
    }
}
