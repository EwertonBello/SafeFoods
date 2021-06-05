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
            $old_path = str_replace("https://safefoods.s3.us-east-2.amazonaws.com/","", $company->image);
            if (Storage::disk('s3')->exists($old_path)) {
                Storage::disk('s3')->delete($old_path);
            }
            $path = $request->file('image')->storePubliclyAs('company', $filename, 's3');
            $data['image'] = Storage::disk('s3')->url($path);
        }

        $company->update($data);
    }
}
