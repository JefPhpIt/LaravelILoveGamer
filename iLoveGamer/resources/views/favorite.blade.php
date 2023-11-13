<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Favorite') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="row row-cols-auto">
                            @foreach ($videoGames as $game)                        
                                <div class="card col" style="width: 18rem;">
                                    <img src="{{$game["imgUrl"]}}" class="card-img-top" alt="image">
                                    <div class="card-body">
                                    <h5 class="card-title">{{$game["name"]}}</h5>
                                    {{-- <a href="/favorite?gameId={{$game->id}}" class="btn btn-primary">Add Favorite</a> --}}
                                    </div>
                                </div>  
                            @endforeach
                        </div>  
                     </div>                       
                </div>
            </div>
        </div>
    </div>
</x-app-layout>