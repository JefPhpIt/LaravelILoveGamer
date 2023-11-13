<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    // homepage
    public function home()
    {
        $response = Http::get('https://api.rawg.io/api/games?key=605c25dce78c4f15bd61aaa71b769cca');
        $result = $response->object();

        // dd($result);

        return view('home', [
            'data' => $result,
        ]);
    }
    
    // search
    public function search(Request $request)
    {
        $search = $request->get('search');
        $response = Http::get("https://api.rawg.io/api/games?key=605c25dce78c4f15bd61aaa71b769cca&search=$search");
        $result = $response->object();

        //dd($result);
        
        return view('home', [
            'data' => $result,
        ]);
    }
}
