<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\DetailPlan;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($idPlan)
    {
        if (!$plan = $this-> plan->where('id', $idPlan)->first()){
            return redirect()->back();
        }
        // $details = $plan->details();

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    public function create ($idPlan)
    {
        if (!$plan = $this-> plan->where('id', $idPlan)->first()){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(Request $request, $idPlan )
    {
        if (!$plan = $this-> plan->where('id', $idPlan)->first()){
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->id);

    }

    public function edit ( $idPlan, $idDetail)
    {
        $plan = $this-> plan->where('id', $idPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$idDetail){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    public function update(Request $request, $idPlan, $idDetail)
    {
        $plan = $this-> plan->where('id', $idPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail){
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->id);


    }
}
