<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Молния</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <div>
        <a href="http://biryusa.corp/" class="inline-flex flex-col items-center justify-center m-10 hover:drop-shadow-[0_0_35px_rgba(100,108,255,0.75)] ease-in-out duration-300">
            <img src="{{ asset('logo.svg') }}" alt="">
            <h1 class="mt-1 text-xl font-bold">Назад</h1>
        </a>
        <h1 class="text-5xl text-blue-500 font-bold pl-10 my-10">Список постов</h1>

        @if(count($posts) > 0)
            <div class="flex flex-col pl-10 md:flex-row flex-wrap">
                @foreach ($posts as $item)
                    <div class="flex flex-col m-5 bg-gray-100 border border-gray-200 rounded-lg shadow-2xl md:flex-row md:max-w-xl hover:scale-105 ease-in duration-300">
                        <img class="object-cover w-full rounded-t-lg h-full md:h-48 md:w-48 md:rounded-none md:rounded-s-lg" src="{{ Storage::url($item->image_name) }}" alt="">
                        <div class="flex flex-col w-80 justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $item->title }}</h5>
                            <p class="mb-3 font-normal text-gray-700">{{ $item->description }}</p>
                            <a href="{{ Storage::url($item->pdf_file) }}" target="_blank" class="inline-flex items-center w-40 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                Читать больше
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h1 class="text-5xl font-bold pl-10 mt-10 ml-10">Нет доступных постов.</h1>
        @endif
    </div>
</body>
</html>
