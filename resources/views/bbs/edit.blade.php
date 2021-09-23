<x-app-layout>
    <x-slot name="header">
        <div class = "flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __(('글 수정 폼')) }}
        </h2>
        <button onclick=location.href="{{ route('posts.show', ['post'=>$post->id] ) }}" class="btn btn-info font-bold text-white-800">돌아가기</button>
    </div>
    </x-slot>
    <div class="m-4 p-4">
    <form class="row g-3" method="post" action="{{ route('posts.update', ['post'=>$post->id]) }}" enctype="multipart/form-data">
        @method("patch")
        @csrf
        <div class="col-12">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $post->title }}">
          </div>
          @error('title')
          <div class ="text-red-800 ml-3">
              <span>{{  $message }}</span>
          </div>
          @enderror

        <div class="col-12">
          <label for="content" class="form-label mt-3">Content</label>
          <textarea class="form-control" id="content" name="content" >{{  $post->content  }}</textarea>
        </div>
        @error('content')
        <div class ="text-red-800 ml-3">
            <span>{{  $message }}</span>
        </div>
        @enderror


        @if($post->image)
        <img src="{{ '/storage/images/' . $post->image }}" class="w-20 h-20 rounded-full" alt="..." style="width: 80% margin: 0px auto;">
        @endif
        <div class="col-12">
            <label for="image" class="form-label mt-3">Title</label>
            <input type="file" class="form-control" id="image" name="image" >
        </div>
        

          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
    </form>

    
    </div>
    
</x-app-layout>