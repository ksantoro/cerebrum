<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto px-4 py-4">
    <h1 class="text-4xl">Add Numbers</h1>
    <br><hr><br>
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
    <form method="POST" action="/addnumbers">
    @csrf
        <label for="number_1">Number 1:
            <input type="text" name="number_1" class="bg-gray-200 rounded-md px-2 py-2 border-1 border-black-200">
        </label>
        <label for="number_2">Number 2:
            <input type="text" name="number_2" class="bg-gray-200 rounded-md px-2 py-2 border-1 border-black-200">
        </label>
        <input type="Submit" value="Add Numbers" class="bg-blue-200 rounded-md px-6 py-2 border-1 border-blue-200">
    </form>
    <br><br>
    @if(!empty($answer))
        Answer: {{ $answer }}
    @endif
</div>
</body>
</html>
