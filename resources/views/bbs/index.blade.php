<x-app-layout>
    <x-slot name="header">
        <div class = "flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Posts') }}
        </h2>
        
        <button onclick=location.href="{{ route('posts.create') }}" class="btn btn-info font-bold text-white-800">글쓰기</button>
    </div>
    </x-slot>

    <x-post-list :posts="$posts">
    </x-post-list>
    
</x-app-layout>