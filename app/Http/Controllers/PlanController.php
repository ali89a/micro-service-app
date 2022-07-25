<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanRole;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use Yajra\DataTables\Facades\DataTables;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            $plans = Plan::all();
            return DataTables::of($plans)
                ->addIndexColumn()
                ->addColumn('action', function ($plan) {
                    return view('admin.plan.action-button', compact('plan'));
                })
                ->rawColumns(['action'])
                ->tojson();
        }
        return view('admin.plan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrDuration = Plan::$arrDuration;
        return view('admin.plan.create', compact('arrDuration'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request)
    {
        $plan = new Plan();
        $plan->fill($request->all());
        $plan->save();

        $all_rule = $request->get('role');
        foreach ($all_rule as $i => $row) {
            $plan_role = new PlanRole();
            $plan_role->plan_id = $plan->id;
            $plan_role->name = $row;
            $plan_role->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $arrDuration = Plan::$arrDuration;
        $plan_roles = PlanRole::where('plan_id', $plan->id)->get();
        $planroles[] = '';
        foreach ($plan_roles as  $key => $plan_role) {
            $planroles[] =  $plan_role->name;
        }
        //  dd($planroles);

        return view('admin.plan.edit', compact('plan', 'arrDuration', 'planroles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
