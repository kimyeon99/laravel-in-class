<div class="m-4 p-4">
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <table class="table table-hover" >
        <thead>
        <tr>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
              <td> {{ $post->title }}</td>
              <td> {{ $post->user->name }}</td>
              <td> {{ $post->created_at->diffForHumans() }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>

    {{ $posts->links() }}

</div>

{{-- blade와 클래스 --}}
{{--  blade는 대소문자 구분을 못해서 캡아웃 표기법으로 생성됨 ex)PostList -> post-list --}}
{{-- blade에서는 여기다가 x-를 추가로 붙여서 컴포먼트인 것을 구분한다. --}}