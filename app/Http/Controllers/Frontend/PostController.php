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
        $post = new PostShowResource(Post::with(['comments', 'postVotes' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->where('slug', $slug)->first());

        return Inertia::render('Frontend/Posts/Show', compact('community', 'post'));
    }
}
