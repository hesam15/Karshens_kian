<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Vazirmatn", sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex flex-col lg:flex-row min-h-screen">
        <!-- Image Section -->
        <div class="hidden lg:block lg:w-1/2 lg:mr-[50%]">
            <img src="{{asset('img/car-service.jpg')}}"
                alt="تعمیرگاه خودرو"
                class="w-full h-screen object-cover">
        </div>

        <!-- Form Section -->
        <div class="w-full lg:w-1/2 lg:fixed lg:top-0 lg:right-0 min-h-screen bg-white">
            <div class="flex items-center justify-center min-h-screen px-4 lg:px-6 py-8 lg:py-0">
                <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-6 lg:p-8">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">ورود</h2>
                        <p class="text-sm lg:text-base text-gray-600">برای ورود اطلاعات خود را وارد کنید</p>
                    </div>

                    <hr class="my-6 border-gray-200">

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">ایمیل</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="ایمیل خود را وارد کنید"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                                        required autofocus autocomplete="username">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">رمز عبور</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        placeholder="رمز عبور را وارد کنید"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                                        required autocomplete="current-password">
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-2 sm:space-y-0">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" name="remember">
                                    <span class="mr-2 text-sm text-gray-600">مرا به خاطر بسپار</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-700">
                                        فراموشی رمز عبور
                                    </a>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 text-sm font-medium">
                            ورود
                        </button>

                        <p class="text-center text-sm text-gray-600">
                            حساب کاربری ندارید؟
                            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-medium">ثبت نام</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>