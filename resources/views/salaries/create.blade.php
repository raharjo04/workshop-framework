<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Gaji</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg px-10 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">
            Tambah Data Gaji Pegawai
        </h2>
        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="employee_id" class="block text-gray-700 font-semibold mb-2">Nama Pegawai</label>
                    <select id="employee_id" name="employee_id"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-purple-300">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->nama_lengkap }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="bulan" class="block text-gray-700 font-semibold mb-2">Bulan</label>
                    <input type="text" id="bulan" name="bulan" value="{{ old('bulan') }}"
                        placeholder="Contoh: Oktober 2025"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-purple-300">
                </div>
                <div>
                    <label for="tunjangan" class="block text-gray-700 font-semibold mb-2">Tunjangan</label>
                    <input type="number" id="tunjangan" name="tunjangan" value="{{ old('tunjangan') }}"
                        placeholder="Masukkan tunjangan"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-purple-300">
                </div>
                <div>
                    <label for="potongan" class="block text-gray-700 font-semibold mb-2">Potongan</label>
                    <input type="number" id="potongan" name="potongan" value="{{ old('potongan') }}"
                        placeholder="Masukkan potongan"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-purple-300">
                </div>
            </div>
            <div class="flex items-center justify-between mt-8">
                <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-purple-300">
                    Simpan
                </button>
                <a href="{{ route('salaries.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-gray-300">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>