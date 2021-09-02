<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    @foreach ($posts as $post)
        <div class="my-2">
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
</div>

{{-- blade와 클래스 --}}
{{--  blade는 대소문자 구분을 못해서 캡아웃 표기법으로 생성됨 ex)PostList -> post-list --}}
{{-- blade에서는 여기다가 x-를 추가로 붙여서 컴포먼트인 것을 구분한다. --}}