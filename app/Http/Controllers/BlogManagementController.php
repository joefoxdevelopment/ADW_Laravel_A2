<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogManagementController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/management-console/blog/index');
    }

    public function newBlogPost()
    {
        return view('pages/management-console/blog/new');
    }

    public function addNewBlogPost(Request $request)
    {
        return view('pages/management-console/blog/index');
    }
}
