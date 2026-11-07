<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\AIEngine;

class AIController extends Controller
{
    public function index()
    {
        $aiEngines = AIEngine::all();
        return response()->json($aiEngines);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $aiEngine = AIEngine::create($validatedData);
        return response()->json($aiEngine, 201);
    }

    public function update(Request $request, AIEngine $aiEngine)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $aiEngine->update($validatedData);
        return response()->json($aiEngine);
    }

    public function destroy(AIEngine $aiEngine)
    {
        $aiEngine->delete();
        return response()->json(null, 204);
    }
}
