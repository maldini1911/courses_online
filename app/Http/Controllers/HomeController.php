<?php

namespace App\Http\Controllers;
use App\Http\Requests\Backend\Messages\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\User;
use SweetAlert;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::Publich()->orderBy('id', 'DESC')->paginate(9);
        $comments_count = Comment::count();
        $videos_count = video::Publich()->count();
        $tags_count = Tag::count();

        return view('front-end.welcome', compact('videos', 'comments_count', 'videos_count', 'tags_count'));
    }

    public function home()
    {
        $videos = Video::Publich()->orderBy('id', 'DESC');
        if(request()->has('search') && request()->get('search') != '')
        {
            $videos = $videos->where('name', 'like', '%'. request()->get('search') . '%');
        }
        $videos = $videos->paginate(30);

        return view('front-end.home', compact('videos'));
    }

    public function profile($id)
    {
        $user= User::findOrFail($id);
        return view('front-end.user.profile', compact('user'));
    }

    public function profile_update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $data = $request->all();

        if(auth()->user() && auth()->user()->id == $user->id)
        {
            if(request()->has('password') && request('password') != '')
            {
                $data['password'] =  Hash::make($request->password);
            }else{
                unset($data['password']);
            }

            User::findOrfail($id)->update($data);
            alert()->success('Success Update', 'Done');
        }

        return redirect()->route('frontend.profile', ['id' => $id]);
    }

    public function video($id)
    {
        $video = Video::Publich()->findOrFail($id);
        return view('front-end.video.index', compact('video'));
    }

    public function category($id)
    {
        $cat = Category::findOrfail($id);
        $videos = Video::Publich()->where('cat_id', $id)->paginate(30);
        return view('front-end.category.index', compact('videos', 'cat'));
    }

    public function skills($id)
    {
        $skill = Skill::findOrfail($id);
        $videos = Video::Publich()->wherehas('skills', function($query) use($id){
            $query->where('skill_id', $id);
        })->paginate(30);
        return view('front-end.skill.index', compact('videos', 'skill'));
    }

    public function tags($id)
    {
        $tag = Tag::findOrfail($id);
        $videos = Video::Publich()->wherehas('tags', function($query) use($id){
            $query->where('tag_id', $id);
        })->paginate(30);
        return view('front-end.tag.index', compact('videos', 'tag'));
    }

    public function pages($id)
    {
        $page = Page::findOrfail($id);
        return view('front-end.page.index', compact('page'));
    }

    public function add_comment(Request $request, $id)
    {
        $this->validate(request(), ['comment' => 'required']);
        Comment::create([
            'user_id' => Auth::user()->id,
            'video_id' => $id,
            'comment' => $request->comment
        ]);

        return redirect()->route('index.video', ['id' => $id ,'#comments']);
    }

    public function edit_comment(Request $request, $id)
    {
        $data = $this->validate(request(), ['comment' => 'required']);
        Comment::findOrfail($id)->update($data);
        alert()->success('Success Update Comment', 'Done');
        return redirect()->route('index.video', ['id' => $request->video_id, '#comments']);
    }

    public function add_message(Store $request)
    {
        Message::create($request->all());
        alert()->success('Success Send', 'Done');
        return back();
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('login');
    }
}
