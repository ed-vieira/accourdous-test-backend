<?php

namespace App\Repository\Contracts;

use App\Repository\Base\AbstractRepository;
use App\Services\Support\Owner;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Company;
use App\Repository\Traits\CreateSupport;
use Illuminate\Database\Eloquent\Model;
use Exception;

class ContractRepository extends AbstractRepository implements ContractService {


    use CreateSupport;

    public function __construct(Contract $model) {
        parent::__construct($model);
    }


    public function create(array $params) {
        try{
            $this->beginTransaction();
                $owner = $this->create_owner($params);
                $input['property_id'] = $params['property_id'];
                $input['text'] = $params['text'];
                $input['type'] = $params['ownerType'];
                $contract = $owner->contracts()->create($input);
                $property = $contract->property;
                $property->contracted = true;
                $property->save();
            $this->commit();
           return $contract;

        } catch(Exception $ex){
            $this->rollback();
            return $ex->getMessage();
        }
    }


    public function update(Model $contract, array $params) {
        return $this->updateContract($contract, $params);
    }



    public function updateContract(Contract $contract, array $params) {
            try{
                $this->beginTransaction();
                    $contract->text = $params['text'];
                    $contract->save();
                    $owner = $contract->owner;
                    $owner->fill($params);
                    $owner->save();
                $this->commit();
               return $contract;

            } catch(Exception $ex){
                $this->rollback();
                return $ex->getMessage();
            }
    }



    public function contract_owners() {
        return $this->model()->join('properties', 'properties.id', '=', 'contracts.property_id')
        ->leftJoin('customers', 'customers.id', '=','contracts.owner_id')
        ->leftJoin('companies', 'companies.id', '=', 'contracts.owner_id')
        ->select(Owner::COLUMNS);
     }


     public function search(string $param) {
        return $this->contract_owners()
            ->where('customers.name','like', "%{$param}%")
            ->orWhere('companies.name','like', "%{$param}%")
            ->orWhere('customers.email','like', "%{$param}%")
            ->orWhere('companies.email','like', "%{$param}%")
            ->orWhere('customers.cpf','like', "%{$param}%")
            ->orWhere('companies.cnpj','like', "%{$param}%")
            ->orWhere('properties.state','like', "%{$param}%")
            ->orWhere('properties.city','like', "%{$param}%")
            ->orWhere('properties.district','like', "%{$param}%")
            ->orWhere('properties.title','like', "%{$param}%")
            ->orWhere('properties.street','like', "%{$param}%");
    }


}
