<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use App\Models\VideoGame;
use Illuminate\Support\Facades\Auth;

class VideoGameController extends Controller
{
    public function index()
    {
        return Redirect::back();
    }

    public function addFavorite(Request $request)
    {
        $id = $request->get("gameId");
        $response = Http::get("https://api.rawg.io/api/games/" . $id ."?key=" . "320936eb892d49cea0ef502ce752b61a");
        //dd($response->object());

        $videoGame = VideoGame::create([
            'name' => $response->object()->name,
            'imgUrl' => $response->object()->background_image
        ]);

        $user = Auth::user();

        $user->videoGames()->save($videoGame);

        return Redirect::back();
    }
}
