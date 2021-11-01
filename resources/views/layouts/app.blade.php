<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- 위의 app.js를 보면 defer라고 되어있다. defer는 나중에 미루는 것이다. 그래서 app.js가 실행되기 전에 아래의 swal이 실행되어버려
             app.js의 swal 선언이 안 된 상태라고 오류가 뜨는 것이다. 그래서 아래의 cdn을 추가하여 swal을 먼저 선언해 오류가 뜨지 않도록 했다.-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
        </div>
            </header>

            <!-- Page Content -->
            <main id="app">
                {{ $slot }}
            </main>
        </div>

        <script>
            function confirmDelete(e){
              myform = document.getElementById('form');
              flag = confirm('삭제 하시겠습니까?');
                
              if(flag){
                myform.submit();
              }
            }
            
            // session을 사용한 이유: 실제로 store 됨에 따라 뜨는 알람창이어서 특별히 session을 사용했다. //
            // 글쓴이가 글을 씀 -> postscontroller의 store에 with('success', 'true')로 session을 보내준다.->(app.js에서 선언된 상태)
            // -> app.blade.php에서 if(session('success')) 에서 확인 -> showSuccessMessage() 실행-> 브라우저에 sweetalert가 뜬다.//


            @if(session('success'))
                showSuccessMessage();
            @endif

            function showSuccessMessage(){
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
          </script>
    </body>
</html>