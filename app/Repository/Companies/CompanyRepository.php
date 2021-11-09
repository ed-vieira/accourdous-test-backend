<?php

namespace App\Repository\Companies;

use App\Repository\Base\AbstractRepository;
use App\Models\Company;


class CompanyRepository extends AbstractRepository {


    public function __construct(Company $company)
    {
        parent::__construct($company);
    }


}
