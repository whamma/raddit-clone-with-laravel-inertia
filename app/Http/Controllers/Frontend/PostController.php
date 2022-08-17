<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function show($community_slug, $slug)
    {
        $community = Community::findBySlugOrFail($community_slug);
        $post = Post::findBySlugOrFail($slug);

        return Inertia::render('Frontend/Posts/Show', compact('community', 'post'));
    }
}
