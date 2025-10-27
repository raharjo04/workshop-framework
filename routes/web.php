<?php

use App\Http\Controllers\Attendancecontroller;
use App\Http\Controllers\Departmentcontroller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Positioncontroller;
use App\Http\Controllers\Salarycontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('employees', EmployeeController::class);
Route::resource('departments', Departmentcontroller::class);
Route::resource('positions', Positioncontroller::class);
Route::resource('salaries', Salarycontroller::class);
Route::resource('attendances', Attendancecontroller::class);