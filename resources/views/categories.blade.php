<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased">
    <a href="{{ route('categories.create') }}">create New Category</a>
    <table class="border">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>
                        {{ $category->id }}
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}">show</a>
                        <a href="{{ route('categories.edit', $category->id) }}">edit</a>
                        <a href="{{ route('categories.delete', $category->id) }}">delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">no categories</td>
                </tr>
            @endforelse
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </tbody>
    </table>
</body>

</html>
