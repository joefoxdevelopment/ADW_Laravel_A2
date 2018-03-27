<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Project;
use App\Http\Requests\SendMessage;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    var $paginationLimit = 10;

	public function index() {
		return view('pages/user/index', [
            'project' => $this->getRandomProject(),
            'post'    => $this->getRecentBlogPost(),
        ]);
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
                'prev' => BlogPost::where('blogpost_id', '<', $post->blogpost_id)->orderby('blogpost_id', 'desc')->first(),
                'next' => BlogPost::where('blogpost_id', '>', $post->blogpost_id)->first(),
            ]
        );
    }

    public function projects() {
        return view(
            'pages/user/projects',
            [
                'projects' => Project::paginate($this->paginationLimit),
            ]
        );
    }

    public function contact() {
        return view(
            'pages/user/contact',
            [
                'linkedin' => Config::get('social.linkedin'),
                'reddit'   => Config::get('social.reddit'),
                'twitter'  => Config::get('social.twitter'),
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
            'username' => Config::get('social.discord.webhook.bot_name'),
        ];

        $curl = curl_init(Config::get('social.discord.webhook.url'));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl);

        return redirect()->route('contact');
    }

    private function getRecentBlogPost() {
        return BlogPost::latest()->first();
    }

    private function getRandomProject() {
        return Project::inRandomOrder()->first();
    }
}
