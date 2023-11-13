<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function index(Request $request)
    {

        $games = [];

        if ($request->isMethod("post")) {
            $search = $request->get('search');
            $apiKey = env('RAWG_API_KEY');
            $response = Http::get("https://api.rawg.io/api/games?key=$apiKey&search=$search");

            $games = $response->object()->results;
        }
        //dd($games);

        return view("games.index", ["games" => $games]);
    }


    public function search()
    {

        $search = $request->get('search');
        $apiKey = env('RAWG_API_KEY');
        $response = Http::get("https://api.rawg.io/api/games?key=$apiKey&search=$search");


        $response->object();
    }


    public function ajouterFavoris($id)
    {

        $response = Http::get("https://api.rawg.io/api/games/" . $id . "?key=e9e69163a0584c17855091b7996f9f84");

        $game = $response->object();
        $newGame = new game();

        $newGame->background_image = $game->background_image;
        $newGame->name = $game->name;
        $newGame->idAPI = $game->id;
        $newGame->save();

        Auth::user()->games()->attach($newGame->id);


        return redirect("/");


        //dd($game);
    }

    public function afficher()
    {

        $games = Auth::user()->games;

        return view("games.favoris", ["games" => $games]);
    }

    public function destroy($gameid)
    {
        
        $game = Game::find($gameid);
        
       

        Auth::user()->games()->detach($game->id);
      return redirect("/favoris");
    }
}
