<!DOCTYPE html>
    <form method="POST" action="/user/update">
        @csrf
        <label>
            Blood Type:
            <input type="text" name="blood_type" value="{{ old('blood_type', $user->blood_type) }}">
        </label>
        <label>
            Birthday:
            <input type="date" name="birthday" value="{{ old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : null) }}">
        </label>
        <button type="submit">Update</button>
    </form>
</html>
