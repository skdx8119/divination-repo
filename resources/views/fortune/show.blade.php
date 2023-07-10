<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('占い結果') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('{{ asset('images/23928558.jpg') }}'); background-size: cover;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title bg-indigo-400 text-white rounded-lg text-lg px-4 py-2 inline-block">これがあなたの運命です：</h5>
                                <p class="card-text px-4 py-2">{{ $fortune }}</p>

                                <h5 class="card-title bg-yellow-300 text-white rounded-lg text-lg px-4 py-2 inline-block">これがあなたのラッキーアイテムです：</h5>
                                <p class="card-text px-4 py-2">{{ $lucky_item }}</p>

                                <h5 class="card-title bg-pink-400 text-white rounded-lg text-lg px-4 py-2 inline-block">あなたと相性の良い人物：</h5>
                                <p class="card-text px-4 py-2">{{ $compatible_person }}{{ $compatible_blood_type }}型、誕生日:{{ $compatible_birthday }}</p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
