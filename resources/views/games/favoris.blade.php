<x-app-layout>
@foreach($games as $game)

<p>{{$game->name}}</p>
<img src="{{$game->background_image}}" alt="" width="300px">
<a href="/games/delete/{{$game->id}}">supprimer favoris</a>
@endforeach


</x-app-layout>