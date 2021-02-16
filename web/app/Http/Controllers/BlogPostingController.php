<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostingController extends Controller
{
    public function index(Request $request)
    {
        return view('blog_posting.index');
    }
}
