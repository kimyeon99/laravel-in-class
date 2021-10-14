<div>
<div class="card" style="width: 70%; margin:0px auto">
    @if($post->image)
        <img src="{{ '/storage/images/' . $post->image }}" class="card-img-top" alt="..." style="width: 80% margin: 0px auto;">
    @endif
    
    <div class="card-body">
      <h5 class="card-title">{{ $post->title }}</h5>
      {{ count($post->likes) }}
      <p class="card-text">{!! $post->content !!}</p>
    </div>
    <ul class="list-group list-group-flush">
      
      <li class="list-group-item">작성자: {{ $post->user->name }}</li>
      <li class="list-group-item">등록일: {{ $post->created_at }} ({{ $post->created_at->diffForHumans() }})</li>
      <li class="list-group-item">수정일: {{ $post->updated_at }} ({{ $post->updated_at->diffForHumans() }})</li>
    </ul>
    <div class="card-body">
      <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="card-link">수정하기</a>

      <!-- 좋아요 버튼 -->
      <div>
        <like-button :post="{{ $post }}" :loginuser="{{ Auth::user()->id }}"></like-button>
      </div>

      <form id = "form" onsubmit="event.preventDefault(); confirmDelete(event)" action = "{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
        
      @csrf
      @method('delete')
      <button>삭제하기</button>
      </form>
    </div>
  </div>

  {{-- <div class="card mt-2 mb-5" style="width: 70%; margin:5px auto">
    <comment-list :post="{{ $post }}" :loginuser="{{ Auth::user()->id }}"/>
  </div> --}}
</div>