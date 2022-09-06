<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostShowResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show($community_slug, $slug)
    {
        $community = Community::findBySlugOrFail($community_slug);
        $communityPost = Post::with(['comments', 'postVotes' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->where('slug', $slug)->first();
        $post = new PostShowResource($communityPost);

        $posts = PostResource::collection($community->posts()->orderByDesc('votes')->take(6)->get());

        $canUpdate = Auth::check() ? Auth::user()->can('update', $communityPost) : false;
        $canDelete = Auth::check() ? Auth::user()->can('delete', $communityPost) : false;

        return Inertia::render('Frontend/Posts/Show', compact('community', 'post', 'posts', 'canUpdate', 'canDelete'));
    }
}
