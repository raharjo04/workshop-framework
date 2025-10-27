<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Karyawan</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg px-10 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">
            Detail Karyawan
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Nama Lengkap</h3>
                <p class="text-gray-900 font-medium">{{ $employee->nama_lengkap }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Email</h3>
                <p class="text-gray-900 font-medium">{{ $employee->email }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Nomor Telepon</h3>
                <p class="text-gray-900 font-medium">{{ $employee->nomor_telepon }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Tanggal Lahir</h3>
                <p class="text-gray-900 font-medium">
                    {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->translatedFormat('d F Y') }}
                </p>
            </div>
            <div class="md:col-span-2">
                <h3 class="text-gray-600 text-sm font-semibold">Alamat</h3>
                <p class="text-gray-900 font-medium">{{ $employee->alamat }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Tanggal Masuk</h3>
                <p class="text-gray-900 font-medium">
                    {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->translatedFormat('d F Y') }}
                </p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Departemen</h3>
                <p class="text-gray-900 font-medium">{{ $employee->department->nama_departemen ?? '-' }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Jabatan</h3>
                <p class="text-gray-900 font-medium">{{ $employee->position->nama_jabatan ?? '-' }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Status</h3>
                <span
                    class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                    {{ $employee->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ ucfirst($employee->status) }}
                </span>
            </div>
        </div>
        <div class="flex items-center justify-between mt-10">
            <a href="{{ route('employees.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-gray-300">
                ← Kembali
            </a>

            <a href="{{ route('employees.edit', $employee->id) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                Edit Data
            </a>
        </div>
    </div>
</body>
</html>