<?php

namespace App\Repository\Properties;

use App\Repository\Base\AbstractRepository;
use App\Models\Property;


class PropertyRepository extends AbstractRepository implements PropertyService {



    public function __construct(Property $property)
    {
        parent::__construct($property);
    }


    public function create(array $params) {
        return  parent::create([
                    'title' => $params['title'],
                    'description' => $params['description'],
                    'email' => $params['email'],
                    'cep' => str_replace('-','',$params['cep']),
                    'state' => $params['state'],
                    'city' => $params['city'],
                    'district' => $params['district'],
                    'street' => $params['street'],
                    'number' => $params['number'],
                    'complement' => $params['complement'],
                ]);
    }


    public function addresses() {
        return $this->model()->address();
    }


    public function search(string $param) {
        return $this->model()->search($param);
    }


}
