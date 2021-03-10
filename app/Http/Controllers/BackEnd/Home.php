<?php

namespace App\Http\Controllers\BackEnd;
use App\Models\User;
use App\Models\Comment;

class Home extends BackEndController
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $nav_title = 'Home Page';
        $comments = Comment::with('user', 'video')->orderBy('id', 'desc')->paginate(20);
        return view('back-end.home', compact('nav_title', 'comments'));
    }
}
