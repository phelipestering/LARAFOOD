<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
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

        $plans = Plan::paginate();

        // $plans = $this->repository->all();

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {

        $data = $request->all();
        $data['id'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }

    public function show($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if(!$plan)

            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan,
        ]);
    }

    public function delete($id)
    {
        $plan = $this->repository
                                ->where('id', $id)
                                ->with('details')
                                ->first();

        if(!$plan)
            return redirect()->back();

        if ($plan->details->count() > 0 ) {
            return redirect()
                            ->back()
                            ->with('error', 'Existem detalhes vinculados a este plano');
        }

        $plan->delete();

            return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {

        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', compact('plans','filters'));

    }

    public function edit($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if(!$plan)

            return redirect()->back();

        return view('admin.pages.plans.edit', compact('plan'));
    }

    public function update(StoreUpdatePlan $request, $id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if(!$plan)

            return redirect()->back();

        $plan->update($request -> all());

        return redirect()->route('plans.index');

    }
}
