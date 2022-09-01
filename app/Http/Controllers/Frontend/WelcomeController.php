<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Http\Resources\CommunityResource;
use App\Models\Community;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = CommunityPostResource::collection(Post::with(['community', 'comments', 'user', 'postVotes' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->withCount('comments')->orderByDesc('votes')->take(12)->get());

        $communities = CommunityResource::collection(Community::withCount('posts')->orderByDesc('posts_count')->take(6)->get());

        return Inertia::render('Welcome', compact('posts', 'communities'));
    }
}
