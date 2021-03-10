<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{

   public function getUsers()
   {
        $users = User::all();
        return response()->json(['status' => 'success', 'data' => $users]);
   }

    public function store(Request $request)
    {

        $user = User::create($request->all());
        return response()->json(['status' => 'success', 'data' => $user]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(request()->has('password') && request()->get('password') != '')
        {
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        $user = User::findOrfail($id)->update($data);

        return response()->json(['status' => 'success', 'data' => $user]);
    }

    public function delete(Request $request, $id)
    {

        $del = User::findOrfail($id);
        $del->delete();
        return response()->json(['status' => 'success', 'data' => $del]);
    }

}
