<?php

namespace App\Http\Controllers;

use App\Models\LogAction;

class LogActionController extends Controller
{
    public function index()
    {
        $logs = LogAction::getAll();
        return view('pages.logs')->with('logs', $logs);
    }
}
