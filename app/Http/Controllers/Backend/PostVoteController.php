<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostVote;
use Illuminate\Http\Request;

class PostVoteController extends Controller
{
    public function upVote($slug)
    {
        $post = Post::findBySlug($slug);
        $isVoted = PostVote::query()
            ->where('post_id', $post->id)
            ->where('user_id', auth()->id())
            ->first();
        if ($isVoted) {
            if ($isVoted->vote === -1) {
                $isVoted->update(['vote' => 1]);
                $post->increment('votes', 2);
                return redirect()->back();
            } else if ($isVoted->vote === 1) {
                return redirect()->back();
            }
        } else {
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => 1
            ]);
            $post->increment('votes');
        }

        return redirect()->back();
    }

    public function downVote($slug)
    {
        $post = Post::findBySlug($slug);
        $isVoted = PostVote::query()
            ->where('post_id', $post->id)
            ->where('user_id', auth()->id())
            ->first();
        if ($isVoted) {
            if ($isVoted->vote === 1) {
                $isVoted->update(['vote' => -1]);
                $post->decrement('votes', 2);
                return redirect()->back();
            } else if ($isVoted->vote === -1) {
                return redirect()->back();
            }
        } else {
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => -1
            ]);
            $post->decrement('votes');
        }

        return redirect()->back();
    }
}
