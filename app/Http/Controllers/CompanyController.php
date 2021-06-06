<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\AccessDeliveryResource;
use App\Http\Resources\CompanyItemResource;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Repositories\CompanyRepositoryInterface;

class CompanyController extends Controller
{
    private $repository;

    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display company dashboard.
     *
     * @return \Inertia\Response
     */
    public function dashboard()
    {
        $company = $this->repository->myCompany();
        $access_deliveries = $company->accessDeliveries()->orderBy('id', 'desc')->cursorPaginate(5);
        $access_deliveries_count = $company->accessDeliveries->count();
        $access_today_deliveries_count = $company->accessDeliveries()->today()->count();

        return Inertia::render('Dashboard', [
            'accessDeliveries' => AccessDeliveryResource::collection($access_deliveries),
            'accessDeliveriesCount' => $access_deliveries_count,
            'accessDeliveriesTodayCount' => $access_today_deliveries_count,
        ]);
    }

    /**
     * Register access to delivery and redirect to delivery.
     *
     * @param  int  $company_id
     * @return \Illuminate\Http\Response
     */
    public function delivery(int $company_id)
    {
        $company = $this->repository->getCompany($company_id);
        $company->accessDeliveries()->create();
        return Inertia::location($company->delivery);
    }

    /**
     * Display company of this logged user.
     *
     * @return \Inertia\Response
     */
    public function myCompany()
    {
        $company = $this->repository->myCompany();
        return Inertia::render('Company/Company', [
            'company' => new CompanyResource($company),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $companies = $this->repository->getValidCompanies();
        return Inertia::render('Company/List', [
            'companies' => CompanyItemResource::collection($companies),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $company_id
     * @return \Inertia\Response
     */
    public function show(int $company_id)
    {
        $company = $this->repository->getCompany($company_id);
        return Inertia::render('Company/Show', [
            'company' => new CompanyResource($company),
        ]);
    }

    /**
     * Show the form for editing user company.
     *
     * @param  \App\Models\Company  $company
     * @return \Inertia\Response
     */
    public function edit(Company $company)
    {
        return Inertia::render('Company/Edit', [
            'company' => new CompanyResource($company),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $this->repository->updateCompany($request, $company);
        return Redirect::route('company')
            ->with('success', 'Informações atualizadas com sucesso!');
    }
}
