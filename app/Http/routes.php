<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Post;
use App\boxscore;
use Intervention\Image\Facades\Image;
use App\User;
use AdamWathan\EloquentOAuth\Facades\OAuth;
//use App\Rating;

//use Stevebauman\Location\Facades\Location;
//use Stevebauman\Location\Objects\Location;
//use Stevebauman\Location;
//use Stevebauman\Location\Location;

//use Stevebauman\Location\Objects\Location;
//use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Route;


use willvincent\Rateable\Rating;

use willvincent\Rateable\Rateable;
Route::get('/', function () {


    //$posts = Post::orderBy('created_at', 'desc')->paginate(6);
    $users = User::all();
    $ratings =Rating::all();
    //$scores =boxscore::take(5)->orderBy('datey', 'desc')->limit(5);
    $scores = boxscore::orderBy('datey', 'desc')->take(8)->get();

    $published = Post::where('published','=', '1')->orderBy('created_at','desc')->take(1)->get();

    $main = DB::table('posts')->where([
        ['main_article','1'],
        ['published','1'],
    ])->get();

  //  $main = Post::where('main_article','=', '1')->orderBy('created_at','desc')->take(1)->get();




  //  $posts = Post::where('main_article','!=', '1')->orderBy('created_at','asc')->take(5);

   // $posts = DB::table('posts')->where('main_article', '=', 0)->orderBy('created_at','desc')->limit(4)->get();

    $posts = DB::table('posts')->where([
        ['main_article','0'],
        ['published','1'],
    ])->orderBy('created_at','desc')->limit(4)->get();

    return view('welcome', compact('posts', 'users','ratings','scores', 'main'));
});

//social login package establish authorize route......
Route::get('github/authorize', function(){
    return OAuth::authorize('github');
});
//log user into social network.... also store users email within this function...
Route::get('github/login', function(){
    OAuth::login('github', function ($user, $userDetails){

        $user->email = $userDetails->email;
        $user->name = $userDetails->full_name;

        $user->save();
        //  dd($userDetails);
    });
    return Redirect::intended();

});
//facebook routes.....

// Redirect to Facebook for authorization
Route::get('facebook/authorize', function() {
    return OAuth::authorize('facebook');
});

// Facebook redirects here after authorization
Route::get('facebook/login', function() {

    // Automatically log in existing users
    // or create a new user if necessary.
    OAuth::login('facebook', function ($user, $userDetails){

        $user->email = $userDetails->email;
        $user->name = $userDetails->full_name;
        $user->avatar = $userDetails->avatar;
        $user->save();

    });

    return Redirect::intended();
});


//google routes.....

// Redirect to Google for authorization
Route::get('google/authorize', function() {
    return OAuth::authorize('google');
});

// Google redirects here after authorization
Route::get('google/login', function() {

    // Automatically log in existing users
    // or create a new user if necessary.
    OAuth::login('google', function ($user, $userDetails){

        $user->email = $userDetails->email;
        $user->name = $userDetails->full_name;
        $user->avatar = $userDetails->avatar;


        $user->save();
    });
    return Redirect::intended();
});






Route::get('contact',
    ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::get('about',
    ['as' => 'about', 'uses' => 'AboutController@about']);
Route::get('disclaimer',
    ['as' => 'disclaimer', 'uses' => 'AboutController@disclaimer']);

Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'AboutController@store']);


Route::get('/boxscores/season_2015_2016',
    ['as' => 'boxscores.season2015_2016', 'uses' => 'boxscoreController@season_2015_2016']);

Route::get('/boxscores/season_2014_2015',
    ['as' => 'boxscores.season2014_2015', 'uses' => 'boxscoreController@season_2014_2015']);

Route::get('/boxscores/season_2013_2014',
    ['as' => 'boxscores.season2013_2014', 'uses' => 'boxscoreController@season_2013_2014']);



Route::get('/posts/user_posts','PostsController@user_posts');




Route::get('/posts/test_slides','PostsController@test_slides');


Route::get('/posts/file_upload', ['as' => 'posts.file_upload', 'uses'=>'PostsController@file_upload']);




Route::get('/posts/file_export', ['as' => 'posts.file_export', 'uses'=>'PostsController@file_export']);

Route::get('/boxscores/file_export', ['as' => 'boxscores.file_export', 'uses'=>'boxscoreController@file_export']);


Route::get('/boxscores/file_upload', ['as' => 'boxscores.file_upload', 'uses'=>'boxscoreController@file_upload']);
Route::post('/boxscores/file_upload', 'boxscoreController@statsUploadCsv');


Route::post('/posts/file_upload', 'PostsController@postUploadCsv');






Route::post('/posts/post_rating', 'PostsController@userRating');
Route::post('posts/{id}/{title}', 'PostsController@userRating');



Route::get('/posts/post_rating', ['as' => 'posts.post_rating','uses'=>'PostsController@post_rating']);



Route::group(['middleware' => ['web']], function () {
    Route::resource('posts', 'PostsController');
    Route::resource('boxscores', 'boxscoreController');





});

Route::get('posts/{id}/{title}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
Route::get('boxscores/{id}/{game_string}', ['as' => 'boxscores.show', 'uses' => 'boxscoreController@show']);


Route::get('/test_code/{id}/', ['as' => 'posts.test_code', 'uses' => 'PostsController@test_code']);


Route::get('/show_user/{id}', ['as' => 'posts.show_user', 'uses'=>'PostsController@show_user']);



Route::get('/news/', ['as' => 'posts.news', 'uses'=>'PostsController@news']);

Route::get('/news/general', ['as' => 'posts.general', 'uses'=>'PostsController@general']);

Route::get('/news/retro', ['as' => 'posts.retro', 'uses'=>'PostsController@retro']);

Route::get('/news/nba', ['as' => 'posts.nba', 'uses'=>'PostsController@nba']);

Route::get('/news/former-players', ['as' => 'posts.former-players', 'uses'=>'PostsController@former_players']);





//Route::get('posts/test_code/{id}',['as' => 'posts.test_code', 'uses'=>'PostsController@test_code']);


Route::resource('posts', 'PostsController');

Route::resource('boxscores', 'boxscoreController');

Route::auth();

Route::get('/home', 'HomeController@index');

//Route::post('posts/create/uploadFiles', 'PostsController@uploadFiles');


Route::get('/posts/create', ['as' => 'upload', 'uses' => 'PostsController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'PostsController@postUpload']);


Route::post('do-upload', ['as' => 'do-upload', 'uses' =>'PostsController@doImageUpload']);


//Route::post('upload', function () {
//
//    $input = Input::all();
//
//    $rules = array(
//        'file' => 'image|max:3000',
//    );
//
//    $validation = Validator::make($input, $rules);
//
//    if ($validation->fails())
//    {
//        return Response::make($validation->errors->first(), 400);
//    }
//
//    $file = Input::file('file');
//    //$albumID = Input::get('albumID');
//  //  $museumName = Input::get('museumName');
//
//    if($file) {
//
//        $destinationPath = public_path() . '/images/';
//      //  $filename = $file->getClientOriginalName();
//        $filename = $file->getClientOriginalName();
//
//        $upload_success = Input::file('file')->move($destinationPath, $filename);
//
//        if ($upload_success) {
//
//            // resizing an uploaded file
//            Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);
//
//            $image = New Image();
//            $image->img_path = $filename;
//           // $image->path = $destinationPath;
//          //  $image->album_id = $albumID;
//            $image->save();
//
//            return Response::json('success', 200);
//        } else {
//            return Response::json('error', 400);
//        }
//    }
//});
//Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'PostsController@deleteUpload']);

Route::delete('upload/delete/', [
    'as' => 'upload-remove',
    'uses' => 'PostsController@deleteUpload'
]);
//destroy_image

Route::delete('delete/{id}',array('uses' => 'PostsController@destroy_image', 'as' => 'My.route'));


Route::post('update/{id}', ['as' => 'My.route2', 'uses' =>'PostsController@update_image_caption']);
//Route::post('update/{id}',array('uses' => 'PostsController@update_image_caption', 'as' => 'My.route2'));



//Route::post(
//    'posts/search',
//    array(
//        'as' => 'posts.search',
//        'uses' => 'PostsController@postSearch'
//    )
//);
//Route::get('posts/search', ['as' => 'posts.search', 'uses' => 'PostsController@searchResults']);

//Route::resource('search','as'=>'posts.search';


#Route::resource('users','UsersController');

#Route::get('/posts/user_posts', 'PostsController@user_posts');

//Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
//Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
Route::resource('ratings', 'RatingsController');

Route::post('posts/search', ['as' => 'posts.search', 'uses'=>'PostsController@getIndex']);

Route::get('search', 'PostsController@getIndex');
Route::resource('post-images', 'PostImagesController');