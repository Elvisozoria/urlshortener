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

    public function store(Request $request)
    {
        Url::create([
            'original_url' => $request->original_url,
            'short_url' => '',
            'title' => '',
            'hits' => 1,
            'user_id' => 1,
        ]);
        return back();
    }
    public function destroy(Url $url)
    {
        $url->delete();
        return back();
    }
}
