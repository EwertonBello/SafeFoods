<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\AccessDeliveryResource;
use App\Http\Resources\CompanyItemResource;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    /**
     * Display company dashboard.
     *
     * @param CompanyRepository $repository
     * @return \Inertia\Response
     */
    public function dashboard(CompanyRepository $repository)
    {
        $company = $repository->myCompany();
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
     * @param CompanyRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function delivery(int $company_id, CompanyRepository $repository)
    {
        $company = $repository->getCompany($company_id);
        $company->accessDeliveries()->create();
        return Inertia::location($company->delivery);
    }

    /**
     * Display company of this logged user.
     *
     * @param CompanyRepository $repository
     * @return \Inertia\Response
     */
    public function myCompany(CompanyRepository $repository)
    {
        $company = $repository->myCompany();
        return Inertia::render('Company/Company', [
            'company' => new CompanyResource($company),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param CompanyRepository $repository
     * @return \Inertia\Response
     */
    public function index(CompanyRepository $repository)
    {
        $companies = $repository->getValidCompanies();
        return Inertia::render('Company/List', [
            'companies' => CompanyItemResource::collection($companies),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $company_id
     * @param CompanyRepository $repository
     * @return \Inertia\Response
     */
    public function show(int $company_id, CompanyRepository $repository)
    {
        $company = $repository->getCompany($company_id);
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
     * @param CompanyRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company, CompanyRepository $repository)
    {
        $repository->updateCompany($request, $company);
        return Redirect::route('company')
            ->with('success', 'Informações atualizadas com sucesso!');
    }
}
