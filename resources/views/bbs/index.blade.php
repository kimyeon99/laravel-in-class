<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <x-post-list :posts="$posts">
        @foreach ($posts as $post)
            {{ $post->title }}
            {{ $post->content }}
        @endforeach
    </x-post-list>
    
</x-app-layout>