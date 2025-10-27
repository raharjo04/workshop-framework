<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <title>@yield('title', 'App Pegawai')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <div class="bg-purple-300 w-56">
            <header class="p-5 mb-3">
                <h1 class="text-2xl text-purple-700 font-bold">App Pegawai</h1>
            </header>

            <ul class="pl-4 space-y-3">

                <li>
                    <a href="{{ url('/employees') }}"
                        class="flex items-center text-white text-lg font-medium hover:text-purple-900 transition">
                        <i class="fa-solid fa-id-badge pr-2"></i> Employee
                    </a>
                </li>

                <li>
                    <a href="{{ url('/departments') }}"
                        class="flex items-center text-white text-lg font-medium hover:text-purple-900 transition">
                        <i class="fa-solid fa-building pr-2"></i> Department
                    </a>
                </li>

                <li>
                    <a href="{{ url('/positions') }}"
                        class="flex items-center text-white text-lg font-medium hover:text-purple-900 transition">
                        <i class="fa-solid fa-briefcase pr-2"></i> Position
                    </a>
                </li>

                <li>
                    <a href="{{ url('/attendances') }}"
                        class="flex items-center text-white text-lg font-medium hover:text-purple-900 transition">
                        <i class="fa-solid fa-calendar-check pr-2"></i> Attendance
                    </a>
                </li>

                <li>
                    <a href="{{ url('/salaries') }}"
                        class="flex items-center text-white text-lg font-medium hover:text-purple-900 transition">
                        <i class="fa-solid fa-money-bill-wave pr-2"></i> Salary
                    </a>
                </li>

            </ul>
        </div>

        {{-- CONTENT --}}
        <div class="flex-grow p-8 bg-gray-50 overflow-y-auto">
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="bg-gray-200 text-center py-3 border-t border-gray-300">
        <p class="text-sm text-gray-700">&copy; {{ date('Y') }} App Pegawai</p>
    </footer>
</body>

</html>