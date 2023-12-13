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
        <a href="http://biryusa.corp/" class="inline-flex items-center justify-center m-10 hover:drop-shadow-[0_0_35px_rgba(100,108,255,0.75)] ease-in-out duration-300">
            <img src="{{ asset('logo.svg') }}" alt="">
        </a>
        <h1 class="text-5xl text-blue-600 font-bold pl-10 mt-10">Списочек</h1>

        @if(count($news) > 0)
            <div class="flex flex-col md:flex-row flex-wrap">
                @foreach ($news as $item)
                    <div class="flex flex-col m-10 items-center bg-gray-100 border border-gray-200 rounded-lg shadow-2xl md:flex-row md:max-w-xl hover:bg-gray-100">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-48 md:w-48 md:rounded-none md:rounded-s-lg" src="{{ Storage::url($item->image_name) }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->title }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->description }}</p>
                            <a href="{{ Storage::url($item->pdf_file) }}" target="_blank" class="inline-flex items-center w-40 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
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
            <p>No news available.</p>
        @endif
    </div>
</body>
</html>
