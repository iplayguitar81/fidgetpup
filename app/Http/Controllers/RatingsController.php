<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rating;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $ratings = Rating::paginate(15);

        return view('ratings.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('ratings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */

  

    public function store(Request $request)
    {
        
        Rating::create($request->all());

        Session::flash('flash_message', 'Rating added!');

        return redirect('ratings');
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
        $rating = Rating::findOrFail($id);

        return view('ratings.show', compact('rating'));
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
        $rating = Rating::findOrFail($id);

        return view('ratings.edit', compact('rating'));
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
        
        $rating = Rating::findOrFail($id);
        $rating->update($request->all());

        Session::flash('flash_message', 'Rating updated!');

        return redirect('ratings');
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
        Rating::destroy($id);

        Session::flash('flash_message', 'Rating deleted!');

        return redirect('ratings');
    }
}
