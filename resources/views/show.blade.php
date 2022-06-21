<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto px-4 py-4">
    <h1 class="text-4xl">Show Example</h1>
    <br><hr><br>
    @if (!empty($example))
        <b>Code:</b> {{ $example->code }}<br>
        <b>Description:</b> {{ $example->description }}<br>
        <b>Created:</b> {{ $example->created_at }}<br>
    @else
        There are no example to display.
    @endif
</div>
</body>
</html>
