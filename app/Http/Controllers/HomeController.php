<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');

//        $posts = Post::paginate(15);
//
//        return view(compact('posts'));
    }



    function gameDate($date) {

        $gamedate = new DateTime($date, new DateTimeZone('America/Los_Angeles'));

        $game_date = date_sub($date, date_interval_create_from_date_string('3 hour'));
        $game_date = $game_date->format('M jS Y');

        return $gamedate;

    }
 
}
