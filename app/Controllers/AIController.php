<?php

namespace App\Http\Controllers;

use App\Models\PeopleCounting;
use Illuminate\Http\Request;

class AIController extends Controller
{
    public function index()
    {
        $peopleCountings = PeopleCounting::all();
        return view('ai.index', ['peopleCountings' => $peopleCountings]);
    }
}
