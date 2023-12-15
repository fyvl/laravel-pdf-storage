@extends('layouts.admin')

@section('edit')
    <head>
        <title>Admin</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <form action="{{ route('admin.post.update', ['id' => $posts->id]) }}" method="POST" class="max-w-md mx-auto mt-24">
            @csrf
            @method('PUT')
            <h1 class="text-xl mb-10">Изменение записи</h1>
            <div class="mb-3">
                <label for="username" class="block mb-2 text-lg font-medium text-gray-900">Название</label>
                <input id="username" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5" value="{{ $posts ? $posts->title : '' }}" required>
            </div>
            <div class="mb-5">
                <label for="message" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Описание</label>
                <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300">{{ $posts ? $posts->description : '' }}</textarea>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">Подтвердить</button>
        </form>
    </body>
@endsection
