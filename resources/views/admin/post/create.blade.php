@extends('layouts.admin')

@section('form')
    <head>
        <title>Admin</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <form action="{{ route('admin.post.create') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto mt-24">
            @csrf
            <h1 class="text-xl mb-10">Создание записи</h1>
            <div class="mb-3">
                <label for="username" class="block mb-2 text-md font-medium text-gray-900">Название</label>
                <input id="username" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5" required>
            </div>
            <div class="mb-3">
                <label for="message" class="block mb-2 text-md font-medium text-gray-900">Описание</label>
                <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"></textarea>
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-md font-medium text-gray-900" for="image">Изображение</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="image" type="file" name="image_name">
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-md font-medium text-gray-900" for="pdf_file">PDF файл</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="pdf_file" type="file" name="pdf_file">
            </div>
            <button type="submit" class="text-white bg-blue-700 mt-3 hover:bg-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Создать</button>
        </form>
{{--        <script src="../../../../node_modules/flowbite/dist/flowbite.min.js"></script>--}}
    </body>
@endsection
