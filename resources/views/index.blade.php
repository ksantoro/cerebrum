<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto px-4 py-4">
    <h1 class="text-4xl">Examples</h1>
    <br><hr><br>
    <h3 class="text-2xl">Add a New Example:</h3><br>
    <div class="bg-red-200 border-1 border-red-400 rounded-md">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form method="POST" action="/example">
        @csrf
        <label for="code">Code:
            <input type="text" name="code" class="bg-gray-200 rounded-md px-2 py-2 border-1 border-black-200">
        </label>
        <label for="description">Description:
            <input type="text" name="description" class="bg-gray-200 rounded-md px-2 py-2 border-1 border-black-200">
        </label>
        <input type="Submit" value="Add" class="bg-blue-200 rounded-md px-6 py-2 border-1 border-blue-200">
    </form>
    <br><hr><br>
    <h1>Current Examples</h1>
    @if (!empty($examples))
            @foreach($examples as $example)
            <div class="columns-3 gap-3 border-2 border-gray-100 rounded-md">
                <div class="gap3">
                    <b>Code:</b>
                    <u><a href="/example/{{$example->id}}">{{ $example->code }}</a></u>
                </div>
                <div class="gap-3"><b>Description:</b> {{ $example->description }}</div>
                <div class="gap-3"><b>Created</b>: {{ $example->created_at }}</div>
            </div>
            @endforeach
    @else
        There are no examples to display.
    @endif
</div>
</body>
</html>
