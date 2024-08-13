<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
  public function index(Request $request)
  {
    $query = Division::query();

    if ($request->filled('name')) {
      $query->where('name', 'like', '%' . $request->name . '%');
    }

    $divisions = $query->paginate();

    if (!$divisions->items()) {
      return response()->json([
        'status' => 'error',
        'message' => 'Data not found'
      ], 204);
    }

    return response()->json([
      'status' => 'success',
      'message' => 'Data retrieved successfully',
      'data' => [
        'divisions' => $divisions->items()
      ],
      'pagination' => [
        'current_page' => $divisions->currentPage(),
        'total' => $divisions->total(),
        'per_page' => $divisions->perPage(),
        'last_page' => $divisions->lastPage()
      ]
    ]);
  }
}
