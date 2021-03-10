<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{

    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $nav_title = str_plural(class_basename($this->model)) . ' Control';
        $title_page = $this->getPluralClassName();
        $desc_page = 'Here You Can Add / Edit / Delete' . $title_page;
        $routeName = $this->getClassNameModel();
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with_index = $this->with_index();
        if(!empty($with_index))
        {
            $rows = $rows->with($with_index);
        }
        $rows = $rows->paginate(10);
        return view('back-end.'.$this->getClassNameModel().'.index', compact(
            'rows', 'nav_title', 'title_page', 'desc_page', 'routeName'
        ));
    }
    

    public function create()
    {
        $nav_title = 'Create ' . $this->getClassName();
        $medual = $this->getClassName();
        $title_page = 'Create ' . $this->getClassName();
        $desc_page = 'Here You Can ' . $title_page;
        $routeName = $this->getClassNameModel();
        $folderName = $this->getClassNameModel();
        return view('back-end.'.$folderName.'.create', compact(
            'nav_title', 'medual','title_page', 'desc_page', 'routeName', 'folderName'
        ))->with($this->with_create_edit());
    }
    public function edit($id)
    {
        $nav_title = 'Edit ' . class_basename($this->model);
        $medual = $this->getClassName();
        $title_page = 'Edit ' . $this->getClassName();
        $desc_page = 'Here You Can ' . $title_page;
        $row = $this->model->findOrfail($id);
        $routeName = $this->getClassNameModel();
        $folderName = $this->getClassNameModel();
        return view('back-end.'.$folderName.'.edit', compact(
            'nav_title', 'row', 'medual','title_page', 'desc_page', 'routeName','folderName'
        ))->with($this->with_create_edit());   
    }

    public function destroy($id)
    {
        $this->model->findOrfail($id)->delete();
        return redirect()->route($this->getClassNameModel().'.index');    
    }

    protected function getClassNameModel()
    {
        return str_plural(strtolower(class_basename($this->model)));
    }

    protected function getPluralClassName()
    {
        return str_plural(class_basename($this->model));
    }

    protected function getClassName()
    {
        return class_basename($this->model);
    }
    
    protected function filter($rows)
    {
        return $rows;
    }

    protected function with_index()
    {
        return [];
    }

    protected function with_create_edit()
    {
        return [];
    }
}
