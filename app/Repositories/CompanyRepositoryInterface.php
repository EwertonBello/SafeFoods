<?php
namespace App\Repositories;

interface CompanyRepositoryInterface{

    public function getAll();

    public function getCompany($id);

    public function myCompany();

    public function getValidCompanies();

    public function updateCompany();

}
