<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\SendMessage;
use Illuminate\Support\Facades\Config;

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
        return view(
            'pages/user/contact',
            [
                'twitter' => Config::get('social.twitter'),
                'reddit'  => Config::get('social.reddit'),
            ]
        );
    }

    public function sendMessage(SendMessage $request) {
        $data = [
            'content' => sprintf(
                "***Email:*** %s\n%s",
                $request->email,
                $request->content
            ),
            'username' => 'Joe Fox Development PHP Bot',
        ];

        $curl = curl_init(Config::get('social.discord.webhook.url'));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl);

        return redirect()->route('contact');
    }
}
