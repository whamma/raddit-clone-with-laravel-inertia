<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostShowResource;
use Illuminate\Support\Facades\Redirect;

class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $community = Community::findBySlugOrFail($slug);
        return Inertia::render('Communities/Posts/Create', compact('community'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request, $slug)
    {
        $community = Community::findBySlugOrFail($slug);
        $community->posts()->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
        ]);

        return Redirect::route('frontend.communities.show', $community->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($community_slug, $slug)
    {
        $community = Community::findBySlugOrFail($community_slug);
        $post = Post::findBySlugOrFail($slug);
        $this->authorize('update', $post);
        return Inertia::render('Communities/Posts/Edit', compact('community', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $community_slug, $slug)
    {
        $community = Community::findBySlugOrFail($community_slug);
        $post = Post::findBySlugOrFail($slug);
        $this->authorize('update', $post);
        $post->update($request->validated());

        return Redirect::route('frontend.communities.posts.show', [$community->slug, $post->slug])->with('flash', 'Post update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($community_slug, $slug)
    {
        $community = Community::findBySlugOrFail($community_slug);
        $post = Post::findBySlugOrFail($slug);
        $this->authorize('destroy', $post);
        $post->delete();

        return Redirect::route('frontend.communities.show', $community->slug)->with('flash', 'Post delete successfully.');
    }
}
