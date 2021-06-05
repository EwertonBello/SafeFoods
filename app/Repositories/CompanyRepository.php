<?php

namespace App\Repositories;

use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Company;
use App\Scopes\CompanyScope;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getValidCompanies()
    {
        $allCompanies = Company::withoutGlobalScope(CompanyScope::class)->get();
        return $allCompanies
            ->whereNotNull('name')
            ->whereNotNull('delivery');
    }

    public function getCompany($id)
    {
        $model = Company::withoutGlobalScope(CompanyScope::class);
        return $model->find($id);
    }

    public function myCompany()
    {
        return Auth::user()->company;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  \App\Models\Company  $company
     */
    public function updateCompany(CompanyRequest $request, Company $company)
    {
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
    }
}
