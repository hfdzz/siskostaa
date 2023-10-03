<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    form {
        display: flex;
        flex-direction: column;
        width: 300px;
    }
    textarea {
        padding: 10px;
        margin-bottom: 10px;
    }
    button {
        padding: 10px;
        background-color: #000;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    pre {
        background-color: #eee;
        padding: 10px;
    }

    </style>
</head>
<body>
    <div>
        <h1>Artisan CLI</h1>
        <form action="{{ route('artisan-cli') }}" method="POST">
            @csrf
            <textarea type="text" name="command" placeholder="Enter artisan command"></textarea>
            <button type="submit">Run</button>
        </form>
        <pre>@if(isset($output)){{ $output }}@endif</pre>
    </div>
</body>
</html>