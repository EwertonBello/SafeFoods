<?php

namespace App\Repositories;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

interface CompanyRepositoryInterface{

    public function getValidCompanies();

    public function getCompany($id);

    public function myCompany();

    public function updateCompany(CompanyRequest $request, Company $company);

}
