<?php

namespace App\Http\Controllers;

use App\Models\BlogPosting;
use Illuminate\Http\Request;

class BlogPostingController extends Controller
{
    public function index(Request $request)
    {
        return view('blog_posting.index');
    }

    public function create(Request $request)
    {
        return view('blog_posting.create');
    }

    public function store(Request $request)
    {
        return view('blog_posting.create');
    }

    public function edit(Request $request, BlogPosting $object)
    {
        return view('blog_posting.update');
    }

    public function update(Request $request, BlogPosting $object)
    {
        return view('blog_posting.update');
    }

    public function destroy(Request $request, BlogPosting $object)
    {
        return view('blog_posting.destroy');
    }
}
