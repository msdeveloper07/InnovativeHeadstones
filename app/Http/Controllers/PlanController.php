<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function showPlans()
    {
        return view('plan.index');
    }
}
