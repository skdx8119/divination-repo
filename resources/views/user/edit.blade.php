<form method="POST" action="{{ route('user.update') }}">
    @csrf
    <label for="blood_type">Blood Type:</label>
    <input id="blood_type" type="text" name="blood_type" required>

    <label for="birthday">Birthday:</label>
    <input id="birthday" type="date" name="birthday" required>

    <button type="submit">Update</button>
</form>
