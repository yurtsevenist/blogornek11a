<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {

        return view('pages.main', ['posts' => $this->publishedPosts()->limit(6)->get()]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function post()
    {
        return view('pages.post', ['posts' => $this->publishedPosts()->get()]);
    }

    public function postDetail($id)
    {
        $post = $this->publishedPosts()->findOrFail($id);

        return view('pages.post-detail', ['post' => $post]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    private function publishedPosts()
    {
        return Post::query()
            ->where('is_published', true)
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->orderByDesc('published_at');
    }
}
