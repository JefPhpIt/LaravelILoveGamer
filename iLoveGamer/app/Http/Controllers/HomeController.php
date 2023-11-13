<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view("dashboard");
    }

    public function search(Request $request, $page="1")
    {
        $search = $request->get("search");

        $response = Http::get("https://api.rawg.io/api/games?key=" . "320936eb892d49cea0ef502ce752b61a" . "&page=" . $page .  "&search=" . $search);
        //dd($response->object());
        //dd($search);

        $nbPages = ceil($response->object()->count/20);
        $result = $response->object()->results;

        return view("gamelist",[
            'games' => $result,
            'count' => $nbPages,
            'page' => $page,
            'search' => $search,
        ]);
    }

    public function page(Request $request)
    {
        $page = $request->get("page");
        return $this->search($request, $page);
    }
}
