<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Game;
use App\Models\UserGame;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // dd($user->games);  
     
        $games = [];

        if ($request->isMethod('post')) {
            $search = $request->get('game');
            
            $apiKey = env('RAWG_API_KEY');
            
            $response = Http::get("https://api.rawg.io/api/games?key=$apiKey&search=$search&dates=2010-01-01,2011-12-31");
            $games = $response->object()->results;
            // dd($games);
        
        }

        return view("games.index", ["games" => $games]);
    }


    public function search()
    {


        //dd ($response->object();)
    }
    public function add($id,Request $request)
    {
        $id;

        //dd($id);
        $apiKey     = env('RAWG_API_KEY');              
        $response   = Http::get("https://api.rawg.io/api/games/$id?key=$apiKey");      

        $results    = $response->object();        
       
        
        $game=new Game();

        $game->name         = $results->name;
        $game->image_path   = $results->background_image;
        $game->description  = $results->description;
        $game->idrawgapi    = $results->id;
        $game->save();

        
        // $userGame = new UserGame();
        // $userGame->user_id  = auth()->user()->id;
        // $userGame->game_id  = $game->id;
        // $userGame->save();    

        $user = Auth::user();

        $user->games()->attach($game->id);


        return redirect("/show");


    }


    public  function show(Request $request)
    {
        $listGames = [];
    
        $user = Auth::user();

        // dd($user->games);  
     
        $games = $user->games;       
    
        return view('games.index', ["games" => $games]);
}

}