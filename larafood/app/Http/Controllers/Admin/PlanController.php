<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use illuminate\Pagination\Paginator;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {

        $plans = Plan::paginate(1);

        // $plans = $this->repository->all();

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }
}
