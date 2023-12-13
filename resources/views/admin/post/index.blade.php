@extends('layouts.admin')

@section('content')
    <head>
        <title>Admin</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="ml-10">
            <h2 class="mb-5 text-3xl font-bold tracking-wide text-gray-900">Список постов:</h2>
            @if(count($news) > 0)
                <div class="flex flex-col md:flex-row flex-wrap">
                    @foreach ($news as $item)
                        <a href="{{ route('admin.post.edit', ['id' => $item->id]) }}">
                            <div class="w-96 h-48 max-w-md m-3 p-5 bg-gray-100 border border-gray-200 rounded-xl shadow-2xl hover:bg-gray-200 ease-in-out duration-300">
                                <p class="mb-2 text-lg font-bold tracking-tight text-gray-900">{{ $item->title }}</p>
                                <p class="mb-1 text-lg font-normal text-gray-700">{{ $item->description }}</p>
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
