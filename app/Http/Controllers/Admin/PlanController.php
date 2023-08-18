<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Plan\PlanStoreRequest;
use App\Http\Requests\Admin\Plan\PlanUpdateRequest;
use App\Models\Plan;
use App\Services\IRoleService;
use App\Services\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    protected $planService;

    public function __construct(PlanService $planService)
    {

        $this->planService = $planService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plans = $this->planService->findAll();
        return view("admin.plan.plan", compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.plan.addPlan");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanStoreRequest $request)
    {
        $plan = $this->planService->createPlan($request);
        return redirect()->route('plan.index')->with('success', 'Plan ' . $plan->name . " has been stored");
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
        return view("admin.plan.editPlan", compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanUpdateRequest $request, Plan $plan)
    {
        $this->planService->updatePlan($request, $plan);
        return redirect()->route('plan.index')->with('success', "the Plan " . $plan->name . " has been modified");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $this->planService->deletePlan($plan);
        return redirect()->route('plan.index')->with('success', "the Plan " . $plan->name . " has been removed");
    }
}
