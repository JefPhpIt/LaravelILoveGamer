<?php

namespace App\Http\Controllers;

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
    
}
