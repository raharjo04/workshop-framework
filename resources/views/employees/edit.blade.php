<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-4xl bg-white shadow-md rounded-lg px-10 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">
            Edit Data Karyawan
        </h2>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama_lengkap" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                        value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" placeholder="Masukkan nama lengkap"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email', $employee->email) }}" placeholder="Masukkan email"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="nomor_telepon" class="block text-gray-700 font-semibold mb-2">Nomor Telepon</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                        placeholder="Masukkan nomor telepon"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-gray-700 font-semibold mb-2">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-gray-700 font-semibold mb-2">Alamat</label>
                    <input type="text" id="alamat" name="alamat"
                        value="{{ old('alamat', $employee->alamat) }}" placeholder="Masukkan alamat lengkap"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="tanggal_masuk" class="block text-gray-700 font-semibold mb-2">Tanggal Masuk</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                        value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="departemen_id" class="block text-gray-700 font-semibold mb-2">Departemen</label>
                    <select id="departemen_id" name="departemen_id"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                        <option value="">-- Pilih Departemen --</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ old('departemen_id', $employee->departemen_id) == $department->id ? 'selected' : '' }}>
                            {{ $department->nama_departemen }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="jabatan_id" class="block text-gray-700 font-semibold mb-2">Jabatan</label>
                    <select id="jabatan_id" name="jabatan_id"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($positions as $position)
                        <option value="{{ $position->id }}"
                            {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                            {{ $position->nama_jabatan }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select id="status" name="status"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                        <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-between mt-8">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                    Perbarui
                </button>
                <a href="{{ route('employees.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-gray-300">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>