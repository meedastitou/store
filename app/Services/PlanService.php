<?php

namespace App\Services;

use App\Http\Requests\Admin\Plan\PlanStoreRequest;
use App\Http\Requests\Admin\Plan\PlanUpdateRequest;
use App\Http\Requests\Admin\Roles\RoleStoreRequest;
use App\Http\Requests\Admin\Roles\RoleUpdateRequest;
use App\Models\Plan;
use App\Repositories\IRoleRepository;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;
use Spatie\Permission\Models\Role;

class PlanService
{


  public function findAll()
  {
    return Plan::orderBy('id', 'DESC')->paginate(10);
  }

  public function createPlan(PlanStoreRequest $request): Plan
  {
    return Plan::create($request->validated());
  }

  public function updatePlan(PlanUpdateRequest $request, Plan $plan): bool
  {
    return $plan->update($request->validated());
  }

  public function deletePlan(Plan $plan) : bool
  {
    return $plan->delete();
  }
}
