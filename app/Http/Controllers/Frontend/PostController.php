<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostShowResource;

class PostController extends Controller
{
    public function show($community_slug, $slug)
    {
        $community = Community::findBySlugOrFail($community_slug);
        $post = new PostShowResource(Post::findBySlugOrFail($slug));

        return Inertia::render('Frontend/Posts/Show', compact('community', 'post'));
    }

    public function edit($community_slug, $slug)
    {
        $community = Community::findBySlugOrFail($community_slug);
        $post = new PostShowResource(Post::findBySlugOrFail($slug));

        return Inertia::render('Frontend/Posts/Edit', compact('community', 'post'));
    }

    public function destroy($community_slug, $slug)
    {
        $community = Community::findBySlugOrFail($community_slug);
        $post = Post::findBySlugOrFail($slug);
        $post->delete();

        return to_route('frontend.communities.show', $community->slug)->with('flash', 'Post delete successfully.');
    }
}
