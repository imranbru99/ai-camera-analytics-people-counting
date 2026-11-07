<?php

namespace App\Http\Controllers;

use App\Models\SaaSBusinessEngine;
use Illuminate\Http\Request;

class SaaSBusinessController extends Controller
{
    public function index()
    {
        $saaSBusinessEngines = SaaSBusinessEngine::all();
        return view('saaSBusiness.index', ['saaSBusinessEngines' => $saaSBusinessEngines]);
    }
}
