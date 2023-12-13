@extends('layouts.admin')

@section('content')
    <head>
        <title>Admin</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="ml-10">
            <h2 class="mb-2 text-xl text-gray-900">Список постов:</h2>
            @if(count($news) > 0)
                <div class="flex flex-col md:flex-row flex-wrap">
                    @foreach ($news as $item)
                        <a href="{{ route('admin.post.edit', ['id' => $item->id]) }}">
                            <div class="w-96 max-w-md m-10 p-5 bg-gray-100 border border-gray-200 rounded-xl shadow-2xl hover:bg-gray-200 ease-in-out duration-300">
                                <p class="mb-2 text-md font-bold tracking-tight text-gray-900">{{ $item->title }}</p>
                                <p class="mb-3 font-normal text-gray-700">{{ $item->description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p>No news available.</p>
            @endif
        </div>
    </body>
@endsection
