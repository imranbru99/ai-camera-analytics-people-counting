<?php

namespace App\Http\Controllers;

use App\Models\SafetyIncidentReport;
use Illuminate\Http\Request;

class SafetyIncidentReportController extends Controller
{
    public function index()
    {
        return SafetyIncidentReport::with('safetyIncident', 'user')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'safety_incident_id' => 'required|exists:safety_incidents,id',
            'user_id' => 'required|exists:users,id',
            'report_title' => 'required|string',
            'report_description' => 'required|string',
        ]);

        $safetyIncidentReport = SafetyIncidentReport::create($validatedData);

        return response()->json($safetyIncidentReport, 201);
    }

    public function update(Request $request, SafetyIncidentReport $safetyIncidentReport)
    {
        $validatedData = $request->validate([
            'safety_incident_id' => 'required|exists:safety_incidents,id',
            'user_id' => 'required|exists:users,id',
            'report_title' => 'required|string',
            'report_description' => 'required|string',
        ]);

        $safetyIncidentReport->update($validatedData);

        return response()->json($safetyIncidentReport, 200);
    }

    public function destroy(SafetyIncidentReport $safetyIncidentReport)
    {
        $safetyIncidentReport->delete();

        return response()->json(null, 204);
    }
}
