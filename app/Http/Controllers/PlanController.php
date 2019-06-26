<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('subscription_plans.index', compact('plans'));
    }

    public function show(Plan $plan, Request $request)
    {
        return view('subscription_plans.show', compact('plan'));
    }
}
