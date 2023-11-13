<x-app-layout>
<form action="/" method="post">
    @csrf
    <div>
        <x-input-label for="search" :value="__('Name')" />
        <x-text-input id="search" class="block mt-1 w-full" type="text" name="search" :value="old('search')" required autofocus />
        <x-input-error :messages="$errors->get('search')" class="mt-2" />
    </div>

    <x-primary-button class="ms-4">
        {{ __('Rechercher') }}
    </x-primary-button>
</form>


@foreach($games as $game)


<div class="row">

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$game->name}}</h5>
                <img src="{{$game->background_image}}" alt="" width="300px">
            
                <a href="/games/addfavorites/{{$game->id}}" class="btn btn-primary">ajouter favoris</a>
            </div>
        </div>
    </div>
</div>
@endforeach

</x-app-layout>