<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('form');
});
Route::post('/', function(){
    // defining validation rules comes first
    $data = Input::all();
    //dd($data['link']);
    $rules = array(
        'link' => 'required|url'
    );
    // then we run the form validation
    $validation = Validator::make($data,$rules);

    //If validation fails, we return to the main page with an error info
    if($validation->fails()){
        return Redirect::to('/')
            ->withInput()
            ->withErrors($validation);
    }
    else {
        //dd("Here it comes");
        //Now let's check if we already have the link in our database. If so, we get the first result
        $link = Link::where('url', '=', $data['link'])->first();
        //If we have the URL saved in our database already, we provide that information back to view.
        if($link){
            return Redirect::to('/')
                ->withInput()
                ->with('link', $link->hash);
        }
        //Else we create a new unique URL
        else {
            //First we create a new unique Hash
            do{
                $newHash = Str::random(6);
            }
            while(Link::where('hash', '=', $newHash)->count() > 0);
            //Now we create a new database record
            Link::create(array(
                'url' => $data['link'],
                'hash' => $newHash
            ));
            //And then we return the new shortened URL info to our action
            return Redirect::to('/')
                ->withInput()
                ->with('link', $newHash);
        }

    }
});
