<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="row row-cols-auto">
        @foreach ($data->results as $game)
            <div class="card col" style="width: 18rem;">
                    <img src={{ $game->background_image }} class="card-img-top" alt={{ $game->name }}>
                <div class="card-body">
                    <h2 class="card-title">{{ $game->name }}</h2>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
