<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Skills\Store;
use App\Models\Skill;

class Skills extends BackEndController
{
    public function __construct(Skill $model)
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
        $this->model->create($request->all());
        return redirect()->route('skills.index');
    }


    public function update(Store $request, $id)
    {

        $this->model->findOrfail($id)->update($request->all());

        return redirect()->route('skills.edit', ['id' => $id]);
    }

}
