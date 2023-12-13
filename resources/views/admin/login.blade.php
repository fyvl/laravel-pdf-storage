<head>
    <title>Admin</title>
    @vite('resources/css/app.css')
</head>
<body>
    <form action="{{ route('submitForm') }}" method="POST" class="max-w-sm mx-auto mt-32">
        @csrf
        @method('POST')
        <div class="mb-5">
            <label for="username" class="block mb-2 text-md font-medium text-gray-900">Логин</label>
            <input id="username" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5" placeholder="admin" required>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Пароль</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5 dark:bg-gray-700" required>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Войти</button>
    </form>
</body>
