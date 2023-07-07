<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Your App Name</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gradient-to-r from-green-400 to-blue-500">
        <div class="flex items-center justify-center h-screen text-white">
            <div class="text-center">
                <h1 class="text-4xl font-semibold">Vtuber相性占い</h1>
                <h2 class="text-2xl mt-4">血液型と誕生日から相性の良いVtuberを占ってみよう！</h2>
                <p>・あなたの血液型と誕生日を入力してもらえば、あなたと相性の良いVtuberがわかります！<br><br>占いのロジックは、実際にある「血液型占い」と「星座占い」を参考にしています。<br>その両方がマッチするVtuberが選ばれるので信憑性もバツグン！...かもしれない。</p>
                @if (Route::has('login'))
                    <div class="mt-8">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-white text-gray-800 rounded font-semibold text-lg hover:bg-gray-200">ここをクリックしてね</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 bg-white text-gray-800 rounded font-semibold text-lg hover:bg-gray-200">ログイン</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-white text-gray-800 rounded font-semibold text-lg hover:bg-gray-200">ユーザー登録</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
