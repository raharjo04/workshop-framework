<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class Attendancecontroller extends Controller
{

    public function index()
    {
        $attendances = Attendance::latest()->paginate(5);
        
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'karyawan_id'     => 'required|integer|exists:employees,id',
            'tanggal'         => 'required|date',
            'waktu_masuk'     => 'required|date_format:H:i',
            'waktu_keluar'    => 'required|date_format:H:i',
            'status_absensi'  => 'required|string|max:50'
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendances.index');
    }

    public function show(string $id)
    {
        $attendance = Attendance::find($id);
        return view('attendances.show', compact('attendance'));
    }

    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id'     => 'required|integer|exists:employees,id',
            'tanggal'         => 'required|date',
            'waktu_masuk'     => 'required|date_format:H:i',
            'waktu_keluar'    => 'required|date_format:H:i',
            'status_absensi'  => 'required|string|max:50'
        ]);
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->only([
            'karyawan_id',
            'tanggal',
            'waktu_masuk',
            'waktu_keluar',
            'status_absensi'
        ]));
        return redirect()->route('attendances.index');
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return redirect()->route('attendances.index');
    }
}
