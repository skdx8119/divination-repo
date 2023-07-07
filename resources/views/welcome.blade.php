<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vtuber相性占い
        </h2>
    </x-slot>

    <div class="bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 flex items-center justify-center h-screen text-white">
        <div class="text-center">
            <h1 class="text-4xl font-semibold text-white">Vtuber相性占い</h1>
            <h2 class="text-2xl mt-4 text-white">血液型と誕生日から相性の良いVtuberを占ってみよう！</h2>
            <p class="text-white">・あなたの血液型と誕生日を入力してもらえば、あなたと相性の良いVtuberがわかります！<br><br>占いのロジックは、実際にある「血液型占い」と「星座占い」を参考にしています。<br>その両方がマッチするVtuberが選ばれるので信憑性もバツグン！...かもしれない。</p>
            @if (Route::has('login'))
                <div class="mt-8">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-pink-200 text-gray-800 rounded font-semibold text-lg hover:bg-pink-300">ここをクリックしてね</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-pink-200 text-gray-800 rounded font-semibold text-lg hover:bg-pink-300">ログイン</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-pink-200 text-gray-800 rounded font-semibold text-lg hover:bg-pink-300">ユーザー登録</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>

</x-guest-layout>
