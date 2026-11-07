<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaaSBusinessEngine;

class SaaSBusinessController extends Controller
{
    /**
     * Display a listing of the SaaS business engine.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saasBusinessEngines = SaaSBusinessEngine::all();
        return response()->json($saasBusinessEngines);
    }

    /**
     * Store a newly created SaaS business engine in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
        ]);

        $saasBusinessEngine = SaaSBusinessEngine::create($validatedData);
        return response()->json($saasBusinessEngine, 201);
    }

    /**
     * Display the specified SaaS business engine.
     *
     * @param  \App\Models\SaaSBusinessEngine  $saasBusinessEngine
     * @return \Illuminate\Http\Response
     */
    public function show(SaaSBusinessEngine $saasBusinessEngine)
    {
        return response()->json($saasBusinessEngine);
    }

    /**
     * Update the specified SaaS business engine in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaaSBusinessEngine  $saasBusinessEngine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaaSBusinessEngine $saasBusinessEngine)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
        ]);

        $saasBusinessEngine->update($validatedData);
        return response()->json($saasBusinessEngine);
    }

    /**
     * Remove the specified SaaS business engine from storage.
     *
     * @param  \App\Models\SaaSBusinessEngine  $saasBusinessEngine
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaaSBusinessEngine $saasBusinessEngine)
    {
        $saasBusinessEngine->delete();
        return response()->json(null, 204);
    }
}
