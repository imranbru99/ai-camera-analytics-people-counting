<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Camera;
use App\Http\Resources\CameraResource;

class CameraController extends Controller
{
    /**
     * Display a listing of the cameras.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cameras = Camera::all();
        return CameraResource::collection($cameras);
    }

    /**
     * Store a newly created camera in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $camera = Camera::create($validatedData);
        return new CameraResource($camera);
    }

    /**
     * Display the specified camera.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function show(Camera $camera)
    {
        return new CameraResource($camera);
    }

    /**
     * Update the specified camera in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camera $camera)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $camera->update($validatedData);
        return new CameraResource($camera);
    }

    /**
     * Remove the specified camera from storage.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camera $camera)
    {
        $camera->delete();
        return response()->noContent();
    }
}
