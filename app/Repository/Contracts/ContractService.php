<?php

namespace App\Repository\Contracts;
use App\Interfaces\Repository\IRepository;

interface ContractService extends IRepository {
    public function contract_owners();
    public function search(string $param);
}
