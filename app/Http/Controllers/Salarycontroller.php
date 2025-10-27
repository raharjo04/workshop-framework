<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class Salarycontroller extends Controller
{

    public function index()
    {
        $salaries = Salary::latest()->paginate(5);

        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'bulan' => 'required',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
        ]);

        $employee = Employee::with('position')->findOrFail($request->employee_id);
        $gajiPokok = $employee->position->gaji_pokok;

        $totalGaji = $gajiPokok + $request->tunjangan - $request->potongan;

        Salary::create([
            'employee_id' => $request->employee_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $gajiPokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $totalGaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $salary = Salary::find($id);
        return view('salaries.show', compact('salary'));
    }

    public function edit(string $id)
    {
        $salary = Salary::find($id);
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required',
            'bulan' => 'required',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
        ]);

        $employee = Employee::with('position')->findOrFail($request->employee_id);
        $gajiPokok = $employee->position->gaji_pokok;
        $totalGaji = $gajiPokok + $request->tunjangan - $request->potongan;

        Salary::where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $gajiPokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $totalGaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $salary = Salary::find($id);
        $salary->delete();
        return redirect()->route('salaries.index');
    }
}
