<?php

namespace App\Repositories;

interface CompanyRepositoryInterface{

    public function getValidCompanies();

    public function getCompany($id);

    public function myCompany();

    public function updateCompany();

}
