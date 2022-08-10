<?php

namespace App\Http\Controllers\Backend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Http\Requests\CommunityUpdateRequest;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = Community::all();
        return Inertia::render('Communities/Index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Communities/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunityStoreRequest $request)
    {
        $community = auth()->user()->communities()->create($request->validated());
        return to_route('communities.index')->with('message', 'Community created successfully!');
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
    public function edit($id)
    {
        $community = Community::findOrFail($id);
        return Inertia::render('Communities/Edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommunityUpdateRequest $request, $id)
    {
        $community = Community::findOrFail($id);
        $community->update($request->validated());
        return to_route('communities.index')->with('message', 'Community updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $community = Community::findOrFail($id);
        $community->delete();
        return back()->with('message', 'Community deleted successfully!');
    }
}
