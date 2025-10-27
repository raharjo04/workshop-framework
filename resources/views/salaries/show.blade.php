<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Gaji Pegawai</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg px-10 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800 text-center">Detail Gaji Pegawai</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Nama Pegawai</h3>
                <p class="text-gray-900 font-medium">{{ $salary->employee->nama_lengkap }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Bulan</h3>
                <p class="text-gray-900 font-medium">{{ $salary->bulan }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Gaji Pokok</h3>
                <p class="text-gray-900 font-medium">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Tunjangan</h3>
                <p class="text-gray-900 font-medium">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Potongan</h3>
                <p class="text-gray-900 font-medium">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</p>
            </div>
            <div class="md:col-span-2">
                <h3 class="text-gray-600 text-sm font-semibold">Total Gaji</h3>
                <p class="text-gray-900 font-medium text-lg">
                    Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                </p>
            </div>
        </div>
        <div class="flex justify-between mt-8">
            <a href="{{ route('salaries.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md shadow">
                ← Kembali
            </a>
            <a href="{{ route('salaries.edit', $salary->id) }}"
            class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-purple-300">
            Edit Data
        </a>
    </div>
</div>
</body>
</html>