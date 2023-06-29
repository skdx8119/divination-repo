<!-- Blood Type -->
<div class="mt-4">
    <x-input-label for="blood_type" :value="__('Blood Type')" />

    <select id="blood_type" name="blood_type" class="block mt-1 w-full">
        <option value="">Select blood type</option>
        <option value="A" @if($user->blood_type == 'A') selected @endif>A</option>
        <option value="B" @if($user->blood_type == 'B') selected @endif>B</option>
        <option value="AB" @if($user->blood_type == 'AB') selected @endif>AB</option>
        <option value="O" @if($user->blood_type == 'O') selected @endif>O</option>
    </select>
</div>

<!-- Date of Birth -->
<div class="mt-4">
    <x-input-label for="date_of_birth" :value="__('Date of Birth')" />

    <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="$user->date_of_birth" required />
</div>
