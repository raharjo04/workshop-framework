<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jabatan</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-4xl bg-white shadow-md rounded-lg px-10 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Detail Jabatan</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Nama Jabatan</h3>
                <p class="text-gray-900 font-medium">{{ $position->nama_jabatan }}</p>
            </div>
            
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Gaji Pokok</h3>
                <p class="text-gray-900 font-medium">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</p>
            </div>
            
            <div class="md:col-span-2">
                <h3 class="text-gray-600 text-sm font-semibold">Jumlah Pegawai</h3>
                <p class="text-gray-900 font-medium">{{ $position->employees->count() }}</p>
            </div>
        </div>
        <div class="bg-gray-50 rounded-lg p-4 shadow">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Daftar Pegawai dengan Jabatan Ini</h3>
            @if($position->employees->isEmpty())
            <p class="text-gray-600 italic">Belum ada pegawai yang memiliki jabatan ini.</p>
            @else
            <table class="w-full border-collapse">
                <thead class="bg-purple-200 border-b">
                    <tr>
                        <th class="text-left p-3 font-medium text-gray-700">Nama Pegawai</th>
                        <th class="text-left p-3 font-medium text-gray-700">Departemen</th>
                        <th class="text-center p-3 font-medium text-gray-700 w-32">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($position->employees as $employee)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-3">{{ $employee->nama_lengkap }}</td>
                        <td class="p-3">{{ $employee->department->nama_departemen ?? '-' }}</td>
                        <td class="text-center">
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                            {{ $employee->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <div class="mt-8"> 
        <a href="{{ route('positions.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md shadow">
            ← Kembali
        </a>
    </div>
</div>
</body>
</html>