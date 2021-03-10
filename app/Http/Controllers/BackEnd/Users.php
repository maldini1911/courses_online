<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class Users extends BackEndController
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    protected function filter($rows)
    {
        if(request()->has('name') && request()->get('name') != '')
        {
            $rows = $rows->where('name', request()->get('name'));
        }

        return $rows;
    }

    public function store(Store $request)
    {

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->model->create($data);
        return redirect()->route('users.index');
    }


    public function update(Update $request, $id)
    {
        $data = $request->all();
        if(request()->has('password') && request()->get('password') != '')
        {
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        $this->model->findOrfail($id)->update($data);

        return redirect()->route('users.edit', ['id' => $id]);
    }

}
