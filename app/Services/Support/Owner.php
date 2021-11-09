<?php

namespace App\Services\Support;

class Owner {

    const TYPE = [
        'CUSTOMER' => 0,
        'COMPANY' => 1,
    ];

    const COLUMNS = [
        'contracts.id',
        'contracts.text',
        'contracts.type',
        'contracts.created_at',
        'properties.title',
        'properties.state',
        'properties.city',
        'properties.cep',
        'properties.street',
        'properties.number',
        'companies.name as company_name',
        'companies.email as company_email',
        'companies.cnpj',
        'customers.name as customer_name',
        'customers.email as customer_email',
        'customers.cpf',
    ];

}
