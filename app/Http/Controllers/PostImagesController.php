<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PostImage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PostImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $postimages = PostImage::paginate(15);

        return view('postimages.index', compact('postimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('postimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        PostImage::create($request->all());

        Session::flash('flash_message', 'PostImage added!');

        return redirect('postimages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $postimage = PostImage::findOrFail($id);

        return view('postimages.show', compact('postimage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $postimage = PostImage::findOrFail($id);

        return view('postimages.edit', compact('postimage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $postimage = PostImage::findOrFail($id);
        $postimage->update($request->all());

        Session::flash('flash_message', 'PostImage updated!');

        return redirect('postimages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        PostImage::destroy($id);

        Session::flash('flash_message', 'PostImage deleted!');

        return redirect('postimages');
    }
}
