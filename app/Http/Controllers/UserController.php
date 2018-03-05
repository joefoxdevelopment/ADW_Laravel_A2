<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index() {
		return view('pages/user/index', []);
	}

    public function about() {
        return view('pages/user/index', []);
    }

    public function blog() {
        return view('pages/user/blog', []);
    }

    public function projects() {
        return view('pages/user/index', []);
    }

    public function contact() {
        return view('pages/user/index', []);
    }
}
