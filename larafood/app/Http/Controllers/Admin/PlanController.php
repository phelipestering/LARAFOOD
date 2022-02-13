<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
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

        $plans = Plan::paginate(5);

        // $plans = $this->repository->all();

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)

            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan,
        ]);
    }

    public function delete($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)

            return redirect()->back();

        $plan->delete();

        return redirect()->route('plans.index');
    }

}
