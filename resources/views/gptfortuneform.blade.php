<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPT-3 Fortune Form</title>
</head>
<body>
    <h1>Enter your information for a GPT-3 generated fortune</h1>

    <form action="/gptfortune" method="post">
        @csrf
        <label for="info">Information:</label><br>
        <input type="text" id="info" name="info" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
