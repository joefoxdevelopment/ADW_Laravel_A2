<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\SaveBlogPost;

class BlogManagementController extends Controller
{
    var $paginationLimit = 20;

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
                'posts' => BlogPost::paginate($this->paginationLimit),
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

        return redirect()->route('blog-management-index');
    }

    public function editBlogPost($id)
    {
        $post = BlogPost::find($id);

        return view('pages/management-console/blog/edit', ['post' => $post]);
    }

    public function updateBlogPost(SaveBlogPost $request, $id)
    {
        $post = BlogPost::find($id);

        $post->title     = $request->title;
        $post->contents  = $request->content;
        $post->verified  = isset($request->previewconfirm);
        $post->published = isset($request->publish);
        $post->save();

        return redirect()->route('blog-management-index');
    }

    public function deleteBlogPost($id)
    {
        BlogPost::destroy($id);

        return redirect()->route('blog-management-index');
    }
}
