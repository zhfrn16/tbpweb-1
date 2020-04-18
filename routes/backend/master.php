<?php

Route::resource('permissions', 'PermissionController');
Route::resource('roles', 'RoleController');

Route::resource('faculties', 'FacultyController');
Route::resource('departments', 'DepartmentController');

Route::resource('buildings', 'BuildingController');
Route::resource('rooms', 'RoomController');

Route::resource('students', 'StudentController');
Route::resource('lecturers', 'LecturerController');
Route::resource('staffs', 'StaffController');

Route::resource('users', 'UserController')->only(['edit', 'update']);
