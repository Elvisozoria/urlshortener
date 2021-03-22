<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index ()
    {
        $urls = Url::latest()->get();
        
        return view('urls.index',[
            'urls' => $urls
        ]);
    }

    public function request(Request $request)
    {
        $url_object = $this->create($request->original_url);


        return response()
            ->json(['shorturl' => url('/') . '/' . $url_object->short_url])
            ->withCallback($request->input('callback'));
    }

    public function store(Request $request)
    {
        $url_object = $this->create($request->original_url);
     
        return back();
    }

    public function create($original_url)
    {
        $url_object = Url::create([
            'original_url' => $original_url,
            'short_url' => '',
            'title' => '',
            'hits' => 0,
            'user_id' => 1,
        ]);
        $shorturl = $url_object->generateShortUrl();
        $url_object->getTitle();
        return $url_object;
    }

    public function show()
    {
        
    }
    
    public function destroy(Url $url)
    {
        $url->delete();
        return back();
    }

    public function redirect($shorturl)
    {
        $url_object = Url::where('short_url',$shorturl)->first();
        // dd($url_object);
        return redirect($url_object->visit());
    }
}
