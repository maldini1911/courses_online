<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Tags\Store;
use App\Models\Tag;

class Tags extends BackEndController
{
    public function __construct(Tag $model)
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
        return redirect()->route('tags.index');
    }


    public function update(Store $request, $id)
    {

        $this->model->findOrfail($id)->update($request->all());

        return redirect()->route('tags.edit', ['id' => $id]);
    }
}
