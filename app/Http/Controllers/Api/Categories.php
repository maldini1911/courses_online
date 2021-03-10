<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Category;

class Categories extends Controller
{

   public function getCats()
   {
        $cats = Category::all();
        return response()->json(['status' => 'success', 'data' => $cats]);
   }

    public function store(Request $request)
    {

        $cat = Category::create($request->all());
        return response()->json(['status' => 'success', 'data' => $cat]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $cat = Category::findOrfail($id)->update($data);

        return response()->json(['status' => 'success', 'data' => $cat]);
    }

    public function delete(Request $request, $id)
    {

        $del = Category::findOrfail($id);
        $del->delete();
        return response()->json(['status' => 'success', 'data' => $del]);
    }

}
