<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\SaveBlogPost;

class BlogManagementController extends Controller
{
    var $paginationLimit = 1;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'pages/management-console/blog/index',
            [
                'posts' => $this->listAllBlogPosts(),
            ]
        );
    }

    public function newBlogPost()
    {
        return view('pages/management-console/blog/new');
    }

    public function addNewBlogPost(SaveBlogPost $request)
    {
        $post = new BlogPost();

        $post->user_id   = \Auth::user()->id;
        $post->title     = $request->title;
        $post->contents  = $request->content;
        $post->verified  = isset($request->previewconfirm);
        $post->published = isset($request->publish);
        $post->save();

        return redirect('manage/blog');
    }

    private function listAllBlogPosts()
    {
        return BlogPost::paginate($this->paginationLimit);
    }
}
