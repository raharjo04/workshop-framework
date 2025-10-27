<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Absensi</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg px-10 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">
            Edit Data Absensi
        </h2>
        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="karyawan_id" class="block text-gray-700 font-semibold mb-2">Nama Karyawan</label>
                    <select id="karyawan_id" name="karyawan_id"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                            {{ $employee->nama_lengkap }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="tanggal" class="block text-gray-700 font-semibold mb-2">Tanggal Absensi</label>
                    <input type="date" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', $attendance->tanggal) }}"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="waktu_masuk" class="block text-gray-700 font-semibold mb-2">Waktu Masuk</label>
                    <input type="time" id="waktu_masuk" name="waktu_masuk"
                        value="{{ old('waktu_masuk', \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i')) }}"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="waktu_keluar" class="block text-gray-700 font-semibold mb-2">Waktu Keluar</label>
                    <input type="time" id="waktu_keluar" name="waktu_keluar"
                        value="{{ old('waktu_keluar', \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i')) }}"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div class="md:col-span-2">
                    <label for="status_absensi" class="block text-gray-700 font-semibold mb-2">Status Kehadiran</label>
                    <select id="status_absensi" name="status_absensi"
                        class="w-full border rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                        <option value="">-- Pilih Status --</option>
                        <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-between mt-8">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                    Update
                </button>
                <a href="{{ route('attendances.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring focus:ring-gray-300">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>