<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index() {
        return inertia('Schedule', [
            'schedules' => Schedule::orderBy('name')->get()
        ]);
    }
}
