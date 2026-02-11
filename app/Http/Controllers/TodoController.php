<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return response()->json(Todo::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|unique:todos,text|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $todo = Todo::create($request->only(['text','description','status']));

        return response()->json($todo, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->only(['text','description','status']));

        return response()->json($todo);
    }

    public function destroy($id)
    {
        Todo::destroy($id);
        return response()->json(null, 204);
    }
}
