<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fortune Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">これがあなたの運命です：</h5>
                                <p class="card-text">{{ $fortune }}</p>

                                <h5 class="card-title">これがあなたのラッキーアイテムです：</h5>
                                <p class="card-text">{{ $lucky_item }}</p>

                                <h5 class="card-title">あなたと相性の良い人物：</h5>
                                <p class="card-text">{{ $compatible_blood_type }}型、誕生日{{ $compatible_birthday }}の{{ $compatible_person }}</p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
