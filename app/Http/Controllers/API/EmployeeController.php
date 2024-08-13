<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  public function index(Request $request)
  {
    $query = Employee::query();

    if ($request->filled('name')) {
      $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('division_id')) {
      $query->where('division_id', $request->division_id);
    }

    $employees = $query->paginate();

    return response()->json([
      'status' => 'success',
      'message' => 'Data retrieved successfully',
      'data' => [
        'employees' => $employees->items()
      ],
      'pagination' => [
        'current_page' => $employees->currentPage(),
        'total' => $employees->total(),
        'per_page' => $employees->perPage(),
        'last_page' => $employees->lastPage()
      ]
    ]);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'image' => 'required|image',
      'name' => 'required|string|max:255',
      'phone' => 'required|string|max:15',
      'division' => 'required|exists:divisions,id',
      'position' => 'required|string|max:255',
    ]);

    $employee = Employee::create($validated);

    return response()->json([
      'status' => 'success',
      'message' => 'Employee created successfully',
      'data' => [
        'employee' => $employee
      ]
    ]);
  }

  public function update(Request $request, $id)
  {
    $validated = $request->validate([
      'image' => 'nullable|image',
      'name' => 'required|string|max:255',
      'phone' => 'required|string|max:15',
      'division' => 'required|exists:divisions,id',
      'position' => 'required|string|max:255',
    ]);

    $employee = Employee::find($id);

    if (!$employee) {
      return response()->json([
        'status' => 'error',
        'message' => 'Employee not found'
      ], 404);
    }

    $employee->update($validated);

    return response()->json([
      'status' => 'success',
      'message' => 'Employee updated successfully'
    ]);
  }

  public function destroy($id)
  {
    $employee = Employee::find($id);

    if (!$employee) {
      return response()->json([
        'status' => 'error',
        'message' => 'Employee not found'
      ], 404);
    }

    if ($employee->image && file_exists(storage_path('app/public/' . $employee->image))) {
      unlink(storage_path('app/public/' . $employee->image));
    }
    $employee->delete();

    return response()->json([
      'status' => 'success',
      'message' => 'Employee deleted successfully'
    ]);
  }
}
