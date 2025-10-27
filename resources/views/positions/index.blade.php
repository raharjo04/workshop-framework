@extends('master')
@section('title', 'Daftar Posisi dan Gaji Pokok')
@section('content')
<div class="container mx-auto mt-2">
    <div class="flex justify-between items-end mb-10">
        <div class="flex items-center bg-purple-100 w-40 rounded-sm">
            <i class="fa-solid fa-briefcase pr-2 text-white border-2 border-solid m-2"></i>
            <h1 class="text-xl font-semibold text-purple-600">Position</h1>
        </div>
    </div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Posisi dan Gaji Pokok</h2>
        <a href="{{ route('positions.create') }}"
            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md shadow">
            + Tambah Data
        </a>
    </div>
    <table class="w-full border-collapse bg-white shadow">
        <thead class="bg-purple-200 border-b">
            <tr>
                <th class="text-left p-3 font-medium text-gray-700">Nama Jabatan</th>
                <th class="text-left p-3 font-medium text-gray-700">Gaji Pokok</th>
                <th class="text-center p-3 font-medium text-gray-700 w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $position)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="p-3">{{ $position->nama_jabatan }}</td>
                <td class="p-3">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                <td class="p-3 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('positions.show', $position->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-sm shadow-sm transition">
                            Detail
                        </a>
                        <a href="{{ route('positions.edit', $position->id) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded text-sm shadow-sm transition">
                            Edit
                        </a>
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
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
            @endforeach
        </tbody>
    </table>
</div>
@endsection