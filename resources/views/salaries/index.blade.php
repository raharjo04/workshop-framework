@extends('master')
@section('title', 'Daftar Gaji Pegawai')
@section('content')
<div class="container mx-auto mt-2">
    <div class="flex justify-between items-end mb-10">
        <div class="flex items-center bg-purple-100 w-40 rounded-sm">
            <i class="fa-solid fa-money-bill-wave pr-2 text-white border-2 border-solid m-2"></i>
            <h1 class="text-xl font-semibold text-purple-600">Salary</h1>
        </div>
    </div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Gaji Pegawai</h2>
        <a href="{{ route('salaries.create') }}"
            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md shadow">
            + Tambah Data
        </a>
    </div>
    <table class="w-full border-collapse bg-white shadow">
        <thead class="bg-purple-200 border-b">
            <tr>
                <th class="text-left p-3 font-medium text-gray-700">Nama Pegawai</th>
                <th class="text-left p-3 font-medium text-gray-700">Bulan & Tahun Pembayaran</th>
                <th class="text-left p-3 font-medium text-gray-700">Total Gaji</th>
                <th class="text-center p-3 font-medium text-gray-700 w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($salaries as $salary)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="p-3">{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                <td class="p-3">{{ \Carbon\Carbon::parse($salary->bulan_tahun)->format('F Y') }}</td>
                <td class="p-3 font-semibold text-green-700">
                    Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                </td>
                <td class="p-3 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('salaries.show', $salary->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-sm shadow-sm transition">
                            Detail
                        </a>
                        <a href="{{ route('salaries.edit', $salary->id) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded text-sm shadow-sm transition">
                            Edit
                        </a>
                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data gaji ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-sm shadow-sm transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-5 text-center text-gray-500">
                    Belum ada data gaji pegawai.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection