<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;

class UserController extends Controller
{
    var $paginationLimit = 10;

	public function index() {
		return view('pages/user/index', []);
	}

    public function about() {
        return view('pages/user/index', []);
    }

    public function blog() {
        return view(
            'pages/user/blog',
            [
                'posts' => BlogPost::paginate($this->paginationLimit),
            ]
        );
    }

    public function blogPost($id) {
        $post = BlogPost::find($id);
        return view(
            'pages/user/blogpost',
            [
                'post' => $post,
                'prev' => BlogPost::where('blogpost_id', '<', $post->blogpost_id)->first(),
                'next' => BlogPost::where('blogpost_id', '>', $post->blogpost_id)->first(),
            ]
        );
    }

    public function projects() {
        return view('pages/user/index', []);
    }

    public function contact() {
        return view('pages/user/contact', []);
    }
}
