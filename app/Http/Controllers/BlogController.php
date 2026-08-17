<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $posts = Post::query()
            ->with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(12);

        return view('blog.index', compact(
            'categories',
            'posts'
        ));
    }

    public function category(string $slug)
    {
        $category = Category::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $posts = Post::query()
            ->with('category')
            ->where('category_id', $category->id)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(12);

        return view('blog.category', compact(
            'category',
            'posts'
        ));
    }

    public function show(string $category, string $slug)
    {
        $post = Post::query()
            ->with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        abort_unless(
            $post->category?->slug === $category,
            404
        );

        return view('blog.show', compact('post'));
    }
}
