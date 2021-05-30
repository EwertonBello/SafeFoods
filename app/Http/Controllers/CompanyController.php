<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\AccessDeliveryResource;
use App\Http\Resources\CompanyItemResource;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display company dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $company = Auth::user()->company;
        $access_deliveries = $company->accessDeliveries->all();

        return Inertia::render('Dashboard', [
            'accessDeliveries' => AccessDeliveryResource::collection($access_deliveries),
            'accessDeliveriesCount' => count($access_deliveries),
        ]);
    }

    /**
     * Register access to delivery and redirect to delivery.
     *
     */
    public function delivery(Company $company)
    {
        $company->accessDeliveries()->create();
        return Inertia::location($company->delivery);
    }

    /**
     * Display company of this logged user.
     *
     * @return \Illuminate\Http\Response
     */
    public function myCompany()
    {
        $company = Auth::user()->company;
        return Inertia::render('Company/Company', [
            'company' => new CompanyResource($company),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all()
            ->whereNotNull('name')
            ->whereNotNull('delivery');
        return Inertia::render('Company/List', [
            'companies' => CompanyItemResource::collection($companies),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return Inertia::render('Company/Show', [
            'company' => new CompanyResource($company),
        ]);
    }

    /**
     * Show the form for editing user company.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        if (Auth::id() != $company->user_id) {
            return Redirect::route('company');
        }
        return Inertia::render('Company/Edit', [
            'company' => new CompanyResource($company),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        if (Auth::id() != $company->user_id) {
            return Redirect::route('company');
        }
        $data = $request->all();
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = Str::slug($request->name).'_'.time().'.'.$extension;
            $old_path = 'public/company/'.$company->image;
            if (Storage::exists($old_path)) {
                Storage::delete($old_path);
            }
            $request->image->storeAs('public/company', $filename);
            $data['image'] = '/storage/company/'.$filename;
        }

        $company->update($data);
        return Redirect::route('company')
            ->with('success', 'Informações atualizadas com sucesso!');
    }
}
