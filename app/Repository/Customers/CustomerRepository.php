<?php

namespace App\Repository\Customers;

use App\Repository\Base\AbstractRepository;
use App\Models\Customer;

class CustomerRepository extends AbstractRepository {

    public function __construct(Customer $customer)
    {
        parent::__construct($customer);
    }


}
