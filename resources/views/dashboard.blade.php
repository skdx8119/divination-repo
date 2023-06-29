<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="blood_type" :value="__('Blood Type')" />
                            <select id="blood_type" class="block mt-1 w-full" name="blood_type" required autofocus>
                                <option value="">Select Blood Type</option>
                                <option value="A" {{ old('blood_type', auth()->user()->blood_type) === 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old('blood_type', auth()->user()->blood_type) === 'B' ? 'selected' : '' }}>B</option>
                                <option value="AB" {{ old('blood_type', auth()->user()->blood_type) === 'AB' ? 'selected' : '' }}>AB</option>
                                <option value="O" {{ old('blood_type', auth()->user()->blood_type) === 'O' ? 'selected' : '' }}>O</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="birthday" :value="__('Birthday')" />
                            <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday', auth()->user()->birthday ? auth()->user()->birthday->format('Y-m-d') : null)" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update Profile') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
