<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Pagination Begin -->
                    @if($count > 1)
                        <a href="/page?&search={{$search}}&page=1" class="btn btn-secondary">1</a>
                        @for ($i = $page < 3 ? 1 : $page-1; $i < $count && (($page < 3 && $i < $page + 3) || ($page >= 3 && $i < $page + 2)); $i++)   
                        @if($i > 1)                     
                        <a href="/page?&search={{$search}}&page={{$i}}" class="btn btn-secondary">{{$i}}</a>
                        @endif
                        @endfor
                        @if($count >= $page+3)
                        
                            <a class="">...</a>
                            
                        @endif
                        @if($count > 2)
                        
                            <a href="/page?&search={{$search}}&page={{$count}}" class="btn btn-secondary">{{$count}}</a>
                        
                        @endif
                    @endif
                    <!-- Pagination End -->

                    @foreach($games as $game)                    
                        <div class="card" style="width: 18rem;">
                            <img src="{{$game->background_image}}" class="card-img-top" alt="image">
                            <div class="card-body">
                              <h5 class="card-title">{{$game->name}}</h5>
                              <a href="/favorite?gameId={{$game->id}}" class="btn btn-primary">TODO</a>
                            </div>
                        </div>                    
                    @endforeach

                    <!-- Pagination Begin -->
                    @if($count > 1)
                    <a href="/page?&search={{$search}}&page=1" class="btn btn-secondary">1</a>
                    @for ($i = $page < 3 ? 1 : $page-1; $i < $count && (($page < 3 && $i < $page + 3) || ($page >= 3 && $i < $page + 2)); $i++)   
                    @if($i > 1)                     
                    <a href="/page?&search={{$search}}&page={{$i}}" class="btn btn-secondary">{{$i}}</a>
                    @endif
                    @endfor
                    @if($count >= $page+3)
                    
                        <a class="">...</a>
                        
                    @endif
                    @if($count > 2)
                    
                        <a href="/page?&search={{$search}}&page={{$count}}" class="btn btn-secondary">{{$count}}</a>
                    
                    @endif
                    <!-- Pagination End -->
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>