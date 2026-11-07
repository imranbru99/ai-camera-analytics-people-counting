<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $attendances = $user->attendances()->latest()->paginate(10);
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendance.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'status' => 'required|string',
        ]);

        $attendance = Attendance::create([
            'user_id' => Auth::id(),
            'date' => $validatedData['date'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }

    public function correct($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->status = 'corrected';
        $attendance->save();
        return redirect()->route('attendance.index')->with('success', 'Attendance corrected successfully.');
    }

    public function approve($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->status = 'approved';
        $attendance->save();
        return redirect()->route('attendance.index')->with('success', 'Attendance approved successfully.');
    }
}
