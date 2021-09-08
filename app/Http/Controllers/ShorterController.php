<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShorterController extends Controller
{
    public $generate_url;

    
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $generate_url = Str::random(8);

        $request->validate([
            'url' => ['required','url'],
            'generate_url' => ['sometimes', 'required'],
        ]);

        $url = Url::firstOrCreate(
            [ 'original_url' =>  $request->url],
            ['generate_url' => $generate_url],
        );

        $this->generate_url = $url->generate_url;
    
        return back()->with('generate_url', $this->generate_url);
    }

    public function show($genereta_url)
    {
         $url = Url::where('generate_url', $genereta_url);

         if (!$url->exists()) {
             return redirect('/');
         }
         
         return redirect($url->first()->original_url);
    }
}
