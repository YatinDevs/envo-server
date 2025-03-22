<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{ 
    public function index()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->get();

        // Format image URLs for API response
        $blogs->transform(function ($blog) {
            $blog->image = $blog->image ? asset('storage/' . $blog->image) : null;
            return $blog;
        });

        return response()->json($blogs);
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->image = $blog->image ? asset('storage/' . $blog->image) : null;
        
        return response()->json($blog);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        // Ensure the slug is generated before saving
        $slug = Str::slug($request->title, '-');
         // Check if the slug already exists and make it unique
        $count = Blog::where('slug', 'LIKE', "$slug%")->count();
        $validatedData['slug'] = $count > 0 ? "{$slug}-{$count}" : $slug;

        // Store image if uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $validatedData['image'] = $imagePath;
        }

        
        // Default published date if not provided
        $validatedData['published_at'] = $validatedData['published_at'] ?? now();

        $blog = Blog::create($validatedData);

        return response()->json([
            'message' => 'Blog created successfully',
            'blog' => $blog
        ], 201);
    }
}
