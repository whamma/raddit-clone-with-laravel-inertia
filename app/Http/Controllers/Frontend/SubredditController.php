<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubredditController extends Controller
{
    public function show($slug)
    {
        $subreddit = Community::findBySlugOrFail($slug);
        return Inertia::render('Subreddits/Show', compact('subreddit'));
    }
}
