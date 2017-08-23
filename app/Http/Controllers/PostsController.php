<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Facade;

use Illuminate\Support\Facades\Input;
use App\logic\image\ImageRepository;
use App\Post;
use App\PostImage;

use \App;
use Illuminate\Support\Facades\DB;


use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
//use Validator;
use Flash;
use Illuminate\Routing\Route;

use Auth;

//use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use willvincent\Rateable\Rateable;
use willvincent\Rateable\Rating;
use Illuminate\Database\Eloquent\Model;
use Torann\GeoIP\GeoIPFacade as GeoIP;

use Validator;
//use Request;
use Response;

use Image;



use ImageGallery;

class PostsController extends Controller
{
    use Rateable;



    protected $image;


    public function __construct(PostImage $imageRepository)
    {
        $this->image = $imageRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return void
     *
     *
     *
     */

    public function index( )
    {

  //      $excel= \App::make('excel');

//        $results = Excel::load('app/test-file.csv')->get();
        $user=Auth::id();

        #$posts = Post::where('user_id','=', Auth::id())->get();

        // the right way to do target date range for archives if need be....
        //$posts = Post::orderBy('created_at', 'desc')->whereBetween('created_at',array('2016-05-24','2016-05-25'))->paginate(3);

        $posts = Post::orderBy('created_at', 'desc')->paginate(3);

        

        #$posts=User::with(['posts'])->all();
      #  $posts = Post::where('user_id','=', Auth::id())->get();

       #$posts=dd(\App\User::paginate(5));

        return view('posts.index', compact('posts', 'user', 'results'));

        $this->authorize('isAdmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

        if(Auth::user()) {
        $user =Auth::user()->id;
        }

        return view('posts.create', compact('user'));
        $this->authorize('isAdmin');
    }

    public function post_rating(){


        return view('posts.post_rating');

    }


    public function userRating(Request $request){

        //this needs to be similar to show function and pass $id into it to pull up right
        // record then it will work


        $post = Post::findOrFail($request->input('post_id'));
        
        $rating = new Rating;

        //gotta pass the post_id into this also.....hidden value.......

        //store the actual user input for the rating.....
        $rating->rating = doubleval($request->input('starRate'));
        $rating->rate_message = $request->input('userRateMsg');

        //logged in user id of user making rating
        $rating->user_id = \Auth::id();

        $post->ratings()->save($rating);


     //  dd(Post::first()->ratings);

        return Redirect::back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function postUploadCsv()
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
            return Redirect::route(('posts.file_upload'))->withErrors($validator);
        }
        else
        {
            
            try {
                $csv_file =Excel::load(Input::file('csv-file'))->get();


                foreach($csv_file as $csv)
                {
                    $title=$csv->title;
                    $subhead=$csv->subhead;
                    $body =$csv->body;
                    $imgpath =$csv->imgpath;

                    $csv_import = new Post(['user_id'=> Auth::user()->id,'title' => $title,'subHead' => $subhead,'body' => $body,'imgPath' => $imgpath ]);
                    $csv_import->save();
                }


                \Session::flash('success', 'Post uploaded successfully.');
                return redirect(route('posts.index',compact('results')));
            } catch (\Exception $e) {
                \Session::flash('error', $e->getMessage());
                return redirect(route('posts.index'));
            }
        }
    }




    public function store(Request $request)
    {


        $this->validate($request, [
        'title' => 'required',
        'body' => 'required',
        'subHead' => 'required',

    ]);

        $filename ="";

        if(Input::hasFile('file')){

//            $file = Input::file('file');
//            $file->move('images', $file->getClientOriginalName());

            $photo2= Input::file('file');


            $filename = uniqid(). $photo2->getClientOriginalName();

            $photo2->move('images/', $filename);
            $thumb_string="md-img-".$filename;
            Image::make( 'https://www.trailblazersfans.com/images/'.$filename)->resize(600, 270)->save('images/'.$thumb_string);


        }

        $post = new Post;

        //gotta pass the post_id into this also.....hidden value.......

        //store the actual user input for the rating.....

        $post->user_id = \Auth::id();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->subHead = $request->input('subHead');
        $post->imgPath = $filename;
        $post->mainImg_caption = $request->input('mainImg_caption');
        $post->main_article = $request->input('main_article');
        $post->published = $request->input('published');

        $post->category = $request->input('category');




        $post->body = $request->input('body');
        \Auth::user()->posts()->save($post);
        Session::flash('flash_message', 'Post added!');
        return redirect('posts');
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
        $post = Post::findOrFail($id);


        $post_ratings =Rating::where('post_id','=', $id)->orderBy('created_at', 'desc')->paginate(3);

        //aggregate functions Eloquent style........
        $rating_count =Rating::where('post_id','=', $id)->count();
        $rating_avg =Rating::where('post_id','=', $id)->avg('rating');

        $rating_pct =($rating_avg/5)*100;
       // $rating_avg = $rating_sum/$rating_count;


        return view('posts.show', compact('post','post_ratings','rating_count','rating_avg','rating_pct'));
    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */

    public function getSomeCheckboxAttribute($value)
    {
        return ($value ? 1 : 0);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $checked = $post->main_article;
        $checked = ($checked ? 1 : 0);
        $category = $post->category;

        return view('posts.edit', compact('post','checked','category'));
        $this->authorize('isAdmin');
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
        $page = Post::find($id);

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        $filename ="";
        if(Input::hasFile('file')){

                $photo2= Input::file('file');
                $filename = uniqid(). $photo2->getClientOriginalName();
                $photo2->move('images/', $filename);
                $thumb_string="md-img-".$filename;
                Image::make( 'https://www.trailblazersfans.com/images/'.$filename)->resize(600, 270)->save('images/'.$thumb_string);



        }
        
        $post = Post::findOrFail($id);
        $post->update($request->all());

        if($filename > 0){
        $page->imgPath = $filename;
        $page->save();
        }

        Session::flash('flash_message', 'Post updated!');

        return redirect('posts');
    }

    public function update_image_caption($id, Request $request)
    {
        $post_id = ($request->input('post_id'));

        //maybe.....
        $image = App\ImageGallery::findOrFail($id);


        //App\ImageGallery::destroy($id);
//        $caption = $request->input('caption');
        $image->caption = $request->input('caption');
        //$image = $image->update->caption( $caption);

        $image->save();

        Session::flash('flash_message', 'Image caption updated!');
        return Redirect::back();


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
        Post::destroy($id);

        Session::flash('flash_message', 'Post deleted!');

        return redirect('posts');
    }

    public function destroy_image($id)
    {

        App\ImageGallery::destroy($id);
        Session::flash('flash_message', 'Image deleted!');
        return Redirect::back();
    }

    public function user_posts() {

        $user_name = Auth::user()->name;
        $posts = Post::where('user_id','=', Auth::id())->orderBy('created_at', 'desc')->paginate(3);



       # return view('user_posts', compact('posts'));
        return \View::make('posts.user_posts', compact('posts', 'user_name'));
    }


    public function test_code($id)
    {
        $post = Post::findOrFail($id);

        $post_ratings =Rating::where('post_id','=', $id)->orderBy('created_at', 'desc')->paginate(3);

        //aggregate functions Eloquent style........
        $rating_count =Rating::where('post_id','=', $id)->count();
        $rating_avg =Rating::where('post_id','=', $id)->avg('rating');

        $rating_pct =($rating_avg/5)*100;
        // $rating_avg = $rating_sum/$rating_count;


        return view('posts.test_code', compact('post','post_ratings','rating_count','rating_avg','rating_pct'));
    }



//public function test_code($id){
//    $post = Post::findOrFail($id);
//    return view('posts.test_code', compact('post'));
//}

    public function file_upload()
    {


        return view('posts.file_upload');

    }
    public function doImageUpload(Request $request)
    {


        //return view('posts.file_upload');

        //get the file from the edit post page request...
        $file= $request->file('file');
        //set the file name
        $filename = uniqid(). $file->getClientOriginalName();


        //move the file to correct location
        $file->move('images/', $filename);

        //here is where I need to add the thumbnail also....
        $thumb_string="thmb-".$filename;

        Image::make( 'https://www.trailblazersfans.com/images/'.$filename)->resize(300, 200)->save('images/'.$thumb_string);

        // save the image details into the database

        $post = Post::find($request->input('gallery_id'));
        $image = $post->images()->create([

'gallery_id' => $request->input('gallery_id'),
'file_name' => $filename,
'file_size' => $file->getClientSize(),
'file_mime' => $file->getClientMimeType(),
'file_path' => 'images/' .$filename,
'created_by' => Auth::user()->id,
    ]);


        return $image;
    }



    public function file_export()
{

    //export user posts
    $posts = Post::where('user_id','=', Auth::id())->orderBy('created_at', 'desc')->get();

//export all posts for super user
//        $posts = Post::select('user_id', 'title', 'subhead','body','imgpath', 'created_at')->get();


    Excel::create('blog-posts', function($excel) use($posts) {
        $excel->sheet('Sheet 1', function($sheet) use($posts) {
            $sheet->fromArray($posts);
        });
    })->export('xls');


    return view('posts.file_export', compact('xls'));

}




    public function show_user($id)
    {
        $user=User::findOrFail($id);
        // App\User::find($id);
        $ratings =Rating::where('user_id','=', $id)->orderBy('created_at', 'desc')->paginate(3);

        return view('posts.show_user', compact('user','ratings'));

    }

    public function news()
    {

        $category="news";

        $news = Post::where('category', '=', $category)->take(1)->get();


        $category1="retro";

        $retronews = Post::where('category', '=', $category1)->take(1)->get();

        $category2="nba";

        $nbanews = Post::where('category', '=', $category2)->take(1)->get();


        $category3="former_players";

        $former_players = Post::where('category', '=', $category3)->take(1)->get();
        return view('posts.news', compact('news','retronews', 'nbanews', 'former_players'));
    }

    public function general()
    {

        $category="news";
        $news = Post::where('category', '=', $category)->orderBy('created_at', 'desc')->get();
        $news =collect($news);

        return view('posts.general', compact('news'));
    }


    public function retro()
    {
        $category="retro";

        $news = Post::where('category', '=', $category)->get();


        return view('posts.retro', compact('news'));
    }


    public function nba()
    {

        $category="nba";
        $news = Post::where('category', '=', $category)->orderBy('created_at', 'desc')->get();
        //$news ='nba news feed...';
        return view('posts.nba', compact('news'));
    }


    public function former_players()
    {
        $category="former_players";
        $news = Post::where('category', '=', $category)->orderBy('created_at', 'desc')->get();
        return view('posts.former-players', compact('news'));
    }


    public function map()
    {

        $location = GeoIP::getLocation();
        return view('map', compact('location'));
    }

    public function test_slides(){

        return view('posts.test_slides');
    }

    public function postSearch()
    {
        $user_input = strtolower(Input::get('query'));

        $search = $user_input;


        $results2 = Post::where('title', 'like', "%$search%")
            ->orWhere('body', 'like', "%$search%")
            ->paginate(3)
            ->appends(['search' => $search])
        ;

        return View('posts.search', compact('results2', 'user_input'));

    }

    public function getIndex(Request $request)
    {

        $search = $request->get('search');

        $results2 = Post::where('title', 'like', "%$search%")
            ->orWhere('body', 'like', "%$search%")
            ->orWhere('subhead', 'like', "%$search%")
            ->paginate(3)
            ->appends(['search' => $search])
        ;

       $results_empty= $results2->isEmpty();

        return view('posts.search', compact('results2','search','results_empty'));
    }




//    public function __construct(ImageRepository $imageRepository)
//    {
//        $this->image = $imageRepository;
//    }

    public function getUpload()
    {
        return view('posts.create');
    }

    public function postUpload( Request $request)
    {

        $photo = Input::all();

        $photo2= $request->file('file');


        $filename = uniqid(). $photo2->getClientOriginalName();

        $photo2->move('images/', $filename);
        $thumb_string="thmb-".$filename;
        Image::make( 'https://www.trailblazersfans.com/images/'.$filename)->resize(600, 270)->save('images/'.$thumb_string);

        $response = $this->image->post_image(1);
        return $response;



    }

    public function deleteUpload()
    {

        $filename = Input::get('id');

        if(!$filename)
        {
            return 0;
        }

        $response = $this->image->delete( $filename );

        return $response;
    }



}
