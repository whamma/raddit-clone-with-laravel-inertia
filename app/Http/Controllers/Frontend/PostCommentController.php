<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PostCommentController extends Controller
{
    public function store($community_slug, $slug)
    {
        $data = request()->validate([
            'content' => ['required', 'max:1000']
        ]);
        // $community = Community::findBySlugOrFail($community_slug);
        $post = Post::findBySlugOrFail($slug);
        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $data['content'],
        ]);

        return back();
    }
}
