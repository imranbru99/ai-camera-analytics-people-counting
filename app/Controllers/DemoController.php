<?php

namespace App\Http\Controllers;

use App\Models\PeopleCounting;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
        $peopleCountings = PeopleCounting::all();
        return view('demo.index', ['peopleCountings' => $peopleCountings]);
    }
}
