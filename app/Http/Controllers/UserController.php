<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\SendMessage;
use Illuminate\Support\Facades\Config;
use pimax\FbBotApp;
use pimax\Messages\Message;

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
        $client = new FbBotApp(Config::get('social.facebook.message.token'));

        $message = new Message(
            Config::get('social.facebook.message.profile'),
            sprintf("Email: %s\n%s", $request->email, $request->contents)
        );

        $client->send($message);

        return redirect()->route('contact');
    }

    public function privacyPolicy() {
        return view('pages/user/index', []);
    }
}
