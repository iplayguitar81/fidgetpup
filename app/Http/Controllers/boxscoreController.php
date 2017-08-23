<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\boxscore;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

use \App;
use Illuminate\Support\Facades\DB;

class boxscoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $user=Auth::id();

      //  $boxscores = boxscore::paginate(15);

        $boxscores =boxscore::orderBy('datey', 'desc')->paginate(15);

        return view('boxscores.index', compact('boxscores', 'user'));
    }

    public function file_export()
    {

        //export user posts
        //$scores = boxscore::get();

       // $scores = boxscore::select('select * from boxscores');

      //  $scores = boxscore::all();
     //   $scores = $scores->toArray();
        //$scores = boxscore::all();

//export all posts for super user
        $scores = boxscore::select(array('game_string','datey','hp1_name','hp1_min','hp1_pts','hp1_fgma','hp1_3pma','hp1_ftma','hp1_oreb','hp1_dreb','hp1_reb','hp1_ast','hp1_stl','hp1_blk','hp1_to','hp1_pf','hp1_starter','hp2_name','hp2_min','hp2_pts','hp2_fgma','hp2_3pma','hp2_ftma','hp2_oreb','hp2_dreb','hp2_reb','hp2_ast','hp2_stl','hp2_blk','hp2_to','hp2_pf','hp2_starter','hp3_name','hp3_min','hp3_pts','hp3_fgma','hp3_3pma','hp3_ftma','hp3_oreb','hp3_dreb','hp3_reb','hp3_ast','hp3_stl','hp3_blk','hp3_to','hp3_pf','hp3_starter','hp4_name','hp4_min','hp4_pts','hp4_fgma','hp4_3pma','hp4_ftma','hp4_oreb','hp4_dreb','hp4_reb','hp4_ast','hp4_stl','hp4_blk','hp4_to','hp4_pf','hp4_starter','hp5_name','hp5_min','hp5_pts','hp5_fgma','hp5_3pma','hp5_ftma','hp5_oreb','hp5_dreb','hp5_reb','hp5_ast','hp5_stl','hp5_blk','hp5_to','hp5_pf','hp5_starter','hp6_name','hp6_min','hp6_pts','hp6_fgma','hp6_3pma','hp6_ftma','hp6_oreb','hp6_dreb','hp6_reb','hp6_ast','hp6_stl','hp6_blk','hp6_to','hp6_pf','hp6_starter','hp7_name','hp7_min','hp7_pts','hp7_fgma','hp7_3pma','hp7_ftma','hp7_oreb','hp7_dreb','hp7_reb','hp7_ast','hp7_stl','hp7_blk','hp7_to','hp7_pf','hp7_starter','hp8_name','hp8_min','hp8_pts','hp8_fgma','hp8_3pma','hp8_ftma','hp8_oreb','hp8_dreb','hp8_reb','hp8_ast','hp8_stl','hp8_blk','hp8_to','hp8_pf','hp8_starter','hp9_name','hp9_min','hp9_pts','hp9_fgma','hp9_3pma','hp9_ftma','hp9_oreb','hp9_dreb','hp9_reb','hp9_ast','hp9_stl','hp9_blk','hp9_to','hp9_pf','hp9_starter','hp10_name','hp10_min','hp10_pts','hp10_fgma','hp10_3pma','hp10_ftma','hp10_oreb','hp10_dreb','hp10_reb','hp10_ast','hp10_stl','hp10_blk','hp10_to','hp10_pf','hp10_starter','hp11_name','hp11_min','hp11_pts','hp11_fgma','hp11_3pma','hp11_ftma','hp11_oreb','hp11_dreb','hp11_reb','hp11_ast','hp11_stl','hp11_blk','hp11_to','hp11_pf','hp11_starter','hp12_name','hp12_min','hp12_pts','hp12_fgma','hp12_3pma','hp12_ftma','hp12_oreb','hp12_dreb','hp12_reb','hp12_ast','hp12_stl','hp12_blk','hp12_to','hp12_pf','hp12_starter','hp13_name','hp13_min','hp13_pts','hp13_fgma','hp13_3pma','hp13_ftma','hp13_oreb','hp13_dreb','hp13_reb','hp13_ast','hp13_stl','hp13_blk','hp13_to','hp13_pf','hp13_starter','ap1_name','ap1_min','ap1_pts','ap1_fgma','ap1_3pma','ap1_ftma','ap1_oreb','ap1_dreb','ap1_reb','ap1_ast','ap1_stl','ap1_blk','ap1_to','ap1_pf','ap1_starter','ap2_name','ap2_min','ap2_pts','ap2_fgma','ap2_3pma','ap2_ftma','ap2_oreb','ap2_dreb','ap2_reb','ap2_ast','ap2_stl','ap2_blk','ap2_to','ap2_pf','ap2_starter','ap3_name','ap3_min','ap3_pts','ap3_fgma','ap3_3pma','ap3_ftma','ap3_oreb','ap3_dreb','ap3_reb','ap3_ast','ap3_stl','ap3_blk','ap3_to','ap3_pf','ap3_starter','ap4_name','ap4_min','ap4_pts','ap4_fgma','ap4_3pma','ap4_ftma','ap4_oreb','ap4_dreb','ap4_reb','ap4_ast','ap4_stl','ap4_blk','ap4_to','ap4_pf','ap4_starter','ap5_name','ap5_min','ap5_pts','ap5_fgma','ap5_3pma','ap5_ftma','ap5_oreb','ap5_dreb','ap5_reb','ap5_ast','ap5_stl','ap5_blk','ap5_to','ap5_pf','ap5_starter','ap6_name','ap6_min','ap6_pts','ap6_fgma','ap6_3pma','ap6_ftma','ap6_oreb','ap6_dreb','ap6_reb','ap6_ast','ap6_stl','ap6_blk','ap6_to','ap6_pf','ap6_starter','ap7_name','ap7_min','ap7_pts','ap7_fgma','ap7_3pma','ap7_ftma','ap7_oreb','ap7_dreb','ap7_reb','ap7_ast','ap7_stl','ap7_blk','ap7_to','ap7_pf','ap7_starter','ap8_name','ap8_min','ap8_pts','ap8_fgma','ap8_3pma','ap8_ftma','ap8_oreb','ap8_dreb','ap8_reb','ap8_ast','ap8_stl','ap8_blk','ap8_to','ap8_pf','ap8_starter','ap9_name','ap9_min','ap9_pts','ap9_fgma','ap9_3pma','ap9_ftma','ap9_oreb','ap9_dreb','ap9_reb','ap9_ast','ap9_stl','ap9_blk','ap9_to','ap9_pf','ap9_starter','ap10_name','ap10_min','ap10_pts','ap10_fgma','ap10_3pma','ap10_ftma','ap10_oreb','ap10_dreb','ap10_reb','ap10_ast','ap10_stl','ap10_blk','ap10_to','ap10_pf','ap10_starter','ap11_name','ap11_min','ap11_pts','ap11_fgma','ap11_3pma','ap11_ftma','ap11_oreb','ap11_dreb','ap11_reb','ap11_ast','ap11_stl','ap11_blk','ap11_to','ap11_pf','ap11_starter','ap12_name','ap12_min','ap12_pts','ap12_fgma','ap12_3pma','ap12_ftma','ap12_oreb','ap12_dreb','ap12_reb','ap12_ast','ap12_stl','ap12_blk','ap12_to','ap12_pf','ap12_starter','ap13_name','ap13_min','ap13_pts','ap13_fgma','ap13_3pma','ap13_ftma','ap13_oreb','ap13_dreb','ap13_reb','ap13_ast','ap13_stl','ap13_blk','ap13_to','ap13_pf','ap13_starter','h_nick','a_nick','h_initials','a_initials','aq1','aq2','aq3','aq4','aq5','aq6','aq7','aq8','aq9','aq10','hq1','hq2','hq3','hq4','hq5','hq6','hq7','hq8','hq9','hq10','afgp','aftp','a3ptp','arebt','aastt','astlt','ablkt','hfgp','hftp','h3ptp','hrebt','hastt','hstlt','hblkt','awaytfgma','awaytftma','awayt3fgma','hometfgma','hometftma','homet3fgma','hometoreb','hometdreb','awaytoreb','awaytdreb','hometto','hometpf','awaytto','awaytpf'))->get();

//        $scores = boxscore::select('game_string','datey','afname','hfname','atotal','htotal','arena','capacity','attendance','ref1','ref2','ref3')->get();

  //      $scores = App\boxscore::all();
        set_time_limit(0);
        ini_set('memory_limit', '3G');

        Excel::create('blazers-box-scores', function($excel) use($scores) {
            $excel->sheet('Blazers', function($sheet) use($scores) {
                $sheet->fromArray($scores);
            });
        })->export('csv');


        return view('boxscores.file_export', compact('xls'));

    }

public function season_2015_2016(){

    $user=Auth::id();

    $season = boxscore::orderBy('datey', 'desc')->whereBetween('datey',array('2015-10-27','2016-07-01'))->paginate(10);

    return view('boxscores.season_2015_2016', compact('season', 'user'));
}


    public function season_2014_2015(){

        $user=Auth::id();

        $season = boxscore::orderBy('datey', 'desc')->whereBetween('datey',array('2014-10-20','2015-07-01'))->paginate(10);

        return view('boxscores.season_2014_2015', compact('season', 'user'));
    }



    public function season_2013_2014(){

        $user=Auth::id();

        $season = boxscore::orderBy('datey', 'desc')->whereBetween('datey',array('2013-10-20','2014-07-01'))->paginate(10);

        return view('boxscores.season_2013_2014', compact('season', 'user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('boxscore.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {

        boxscore::create($request->all());

        Session::flash('flash_message', 'boxscore added!');

        return redirect('boxscore');
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
        $boxscore = boxscore::findOrFail($id);

        return view('boxscores.show', compact('boxscore'));
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
        $boxscore = boxscore::findOrFail($id);

        return view('boxscore.edit', compact('boxscore'));
    }


    public function file_upload()
    {


        return view('boxscores.file_upload');

    }


    public function statsUploadCsv()
    {
        $rules = array(
//            'title' => 'required',
//            'subHead' => 'required',
//            'body' => 'required'

        );


        $validator = Validator::make(Input::all(), $rules);
        // process the form
        if ($validator->fails())
        {
            return Redirect::route(('boxscores.file_upload'))->withErrors($validator);
        }
        else
        {


            try {
                Excel::load(Input::file('csv-file'), function ($reader) {

                    foreach ($reader->toArray() as $row) {
                        boxscore::firstOrCreate($row);
                    }
                });
                \Session::flash('success', 'Boxscores uploaded successfully.');
                return redirect(route('boxscores.index'));
            } catch (\Exception $e) {
                \Session::flash('error', $e->getMessage());
                return redirect(route('boxscores.index'));
            }

        }
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

        $boxscore = boxscore::findOrFail($id);
        $boxscore->update($request->all());

        Session::flash('flash_message', 'boxscore updated!');

        return redirect('boxscore');
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
        boxscore::destroy($id);

        Session::flash('flash_message', 'boxscore deleted!');

        return redirect('boxscore');
    }
}
