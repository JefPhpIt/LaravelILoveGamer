<x-app-layout>
    <form method="post">
        @csrf
        <div>
            <x-input-label for="game" :value="__('Game')" />
            <x-text-input id="game" class="block mt-1 w-full" type="text" name="game" :value="old('game')" required autofocus />
            <x-input-error :messages="$errors->get('games')" class="mt-2" />
        </div>
        <button type="submit">Rechercher</button>
    </form>





    @foreach($games as $game)
        <p>{{$game->name}}</p>

        @if ($game->background_image)
        <img src="{{$game->background_image}}" alt="" width="200px">
        @endif


        @if (isset($game->image_path))
        <img src="{{$game->image_path}}" alt="" width="200px">
        @endif

        <a href="{{ route('add', $game->id)}}">Ajouter</a>



        <div>&nbsp;</div>
    @endforeach

</x-app-layout>