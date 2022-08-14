<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityController extends Controller
{
    public function show($slug)
    {
        $community = Community::findBySlugOrFail($slug);
        $posts = $community->posts()->paginate();
        return Inertia::render('Frontend/Communities/Show', compact('community', 'posts'));
    }
}
