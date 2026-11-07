<?php

namespace App\Http\Controllers;

use App\Models\SafetyIncident;
use Illuminate\Http\Request;

class SafetyIncidentController extends Controller
{
    public function index()
    {
        $safetyIncidents = SafetyIncident::all();
        return view('safetyIncident.index', ['safetyIncidents' => $safetyIncidents]);
    }
}
