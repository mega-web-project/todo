<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Todo;

class TodoController extends Controller
{
    //
    public function index() {
  return Todo::all();
}
public function store(Request $request) {
  return Todo::create($request->only(['title']));
}
public function update(Request $request, $id) {
  $todo = Todo::findOrFail($id);
  $todo->update($request->only(['title', 'completed']));
  return $todo;
}
public function destroy($id) {
  Todo::destroy($id);
  return response()->json(['message' => 'Deleted']);
}
}