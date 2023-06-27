<!DOCTYPE html>
<html>
<head>
    <title>Your Fortune</title>
</head>
<body>
    <h1>Your Fortune</h1>

    <form action="/gptfortune" method="post">
        @csrf
        <label for="info">Your Info:</label><br>
        <textarea id="info" name="info" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Get Fortune">
    </form>

    @if (isset($messages))
        @foreach ($messages as $message)
            <h2>{{ $message['title'] }}</h2>
            <p>{{ $message['content'] }}</p>
        @endforeach
    @endif
</body>
</html>
