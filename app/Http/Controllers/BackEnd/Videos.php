<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Comment;

class Videos extends BackEndController
{
    use CommentTrait;

    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    protected function with_index()
    {
        return ['user', 'category'];
    }

    protected function filter($rows)
    {
        if(request()->has('name') && request()->get('name') != '')
        {
            $rows = $rows->where('name', request()->get('name'));
        }

        return $rows;
    }

    protected function with_create_edit()
    {
        $array =  [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectSkills' => [],
            'selectTags' => [],
            'Comments' => [],
        ];

        if(request()->route()->parameter('video'))
        {
         
         //===> Get Skills By Id Video   
         $array['selectSkills'] = $this->model->find(request()->route()->parameter('video'))
            ->skills()->pluck('skills.id')->toArray();

        //===> Get Tags By Id Video
        $array['selectTags'] = $this->model->find(request()->route()->parameter('video'))
        ->tags()->get()->pluck('id')->toArray();
        
        //===> Get Commetns By Id Video
        $array['comments'] = $this->model->find(request()->route()->parameter('video'))->comments()->get();
       
        }

        return $array;
    }

    public function store(Store $request)
    {

        $file = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);

        $requestArray = ['user_id' => auth()->user()->id, 'image' => $fileName] + $request->all();

        $row = $this->model->create($requestArray);
        $this->syncSkills($row, $requestArray);

        return redirect()->route('videos.index');
    }


    public function update(Update $request, $id)
    {
        $requestArray = $request->all();
        if(request()->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $row = $this->model->findOrfail($id);
        $row->update($requestArray);
        $this->syncSkills($row, $requestArray);
        return redirect()->route('videos.edit', ['id' => $id]);
    }

    protected function syncSkills($row,  $requestArray)
    {
        if(isset($requestArray['skills']) && !empty($requestArray['skills']))
        {
            $row->skills()->sync($requestArray['skills']);
        }
        
        if(isset($requestArray['tags']) && !empty($requestArray['tags']))
        {
            $row->tags()->sync($requestArray['tags']);
        }
    }
}
