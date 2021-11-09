<?php

namespace App\Repository\Traits;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Company;
use App\Services\Support\Owner;

trait CreateSupport {



    protected function createCustomer(array $params){
        return Customer::create([
            'name' => $params['name'],
            'cpf' => $this->documentInput($params['cpf']),
            'email' => $params['email'],
        ]);
    }

    protected function createCompany(array $params){
        return Company::create([
            'name' => $params['name'],
            'cnpj' => $this->documentInput($params['cnpj']),
            'email' => $params['email'],
        ]);
    }


    protected function create_owner(array $params): Model {
        $model = null;
        switch ($params['ownerType']) {
            case Owner::TYPE['CUSTOMER']:
                $model = $this->createCustomer($params);
            break;
            case Owner::TYPE['COMPANY']:
                $model = $this->createCompany($params);
            break;
        }
        return $model;
    }



    protected function documentInput(string $document) {
       return str_replace(['.','-','/'], '', $document);
    }

}
