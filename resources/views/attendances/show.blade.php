<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Absensi</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg px-10 py-8">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800 text-center">
                Detail Absensi
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Nama Karyawan</h3>
                <p class="text-gray-900 font-medium">{{ $attendance->employee->nama_lengkap }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Tanggal Absensi</h3>
                <p class="text-gray-900 font-medium">
                    {{ \Carbon\Carbon::parse($attendance->tanggal)->translatedFormat('d F Y') }}
                </p>
            </div>            
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Waktu Masuk</h3>
                <p class="text-gray-900 font-medium">{{ $attendance->waktu_masuk }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Waktu Keluar</h3>
                <p class="text-gray-900 font-medium">{{ $attendance->waktu_keluar ?? '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <h3 class="text-gray-600 text-sm font-semibold">Status Kehadiran</h3>
                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                {{ $attendance->status_absensi === 'hadir' ? 'bg-green-100 text-green-700' : '' }}
                {{ $attendance->status_absensi === 'izin' ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $attendance->status_absensi === 'sakit' ? 'bg-red-100 text-red-700' : '' }}
                {{ $attendance->status_absensi === 'alpha' ? 'bg-gray-300 text-gray-700' : '' }}">
                    {{ ucfirst($attendance->status_absensi) }}
                </span>
            </div>
        </div>
        <div class="flex justify-between mt-8">
            <a href="{{ route('attendances.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md shadow">
                ← Kembali
            </a>
            <a href="{{ route('attendances.edit', $attendance->id) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                Edit Data
            </a>
        </div>
    </div>
</body>
</html>