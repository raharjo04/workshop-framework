<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Departemen</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-5xl bg-white shadow-md rounded-lg px-10 py-8">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center bg-purple-100 w-60 rounded-sm">
                <i class="fa-solid fa-building text-white border-2 border-solid m-2"></i>
                <h1 class="text-xl font-semibold text-purple-600">Detail Departemen</h1>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                {{ $department->nama_departemen }}
            </h2>
            <p class="text-gray-600">
                <span class="font-semibold text-gray-700">Jumlah Pegawai:</span>
                {{ $department->employees->count() }}
            </p>
            <p class="text-gray-600 mt-1">
                <span class="font-semibold text-gray-700">Dibuat pada:</span>
                {{ $department->created_at->format('d M Y') }}
            </p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">
                Daftar Pegawai di Departemen Ini
            </h3>
            @if($department->employees->isEmpty())
            <p class="text-gray-600 italic">Belum ada pegawai yang terdaftar di departemen ini.</p>
            @else
            <table class="w-full border-collapse">
                <thead class="bg-purple-200 border-b">
                    <tr>
                        <th class="text-left p-3 font-medium text-gray-700">Nama Lengkap</th>
                        <th class="text-left p-3 font-medium text-gray-700">Jabatan</th>
                        <th class="text-center p-3 font-medium text-gray-700 w-32">Status</th>
                        <th class="text-center p-3 font-medium text-gray-700 w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($department->employees as $employee)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-3">{{ $employee->nama_lengkap }}</td>
                        <td class="p-3">{{ $employee->position->nama_jabatan ?? '-' }}</td>
                        <td class="text-center">
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                            {{ $employee->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                        <td class="text-center space-x-2">
                            <a href="{{ route('employees.show', $employee->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm shadow-sm transition">
                                Detail
                            </a>
                            <a href="{{ route('employees.edit', $employee->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm shadow-sm transition">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="mt-8">
            <a href="{{ route('departments.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md shadow">
                ← Kembali
            </a>
        </div>
    </div>
</body>
</html>