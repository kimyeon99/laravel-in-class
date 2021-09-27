<x-app-layout>
    <x-slot name="header">
        <div class = "flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('상세보기') }}
        </h2>
        <button onclick=location.href="{{ route('posts.index') }}" class="btn btn-info font-bold text-white-800">목록보기</button>
    </div>
    </x-slot>

    <x-post-show :post="$post"/>
    
</x-app-layout>