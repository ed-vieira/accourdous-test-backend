<?php

namespace App\Interfaces\Repository;


interface IRepository extends IRepositoryEloquent, IRepositoryBuilder {

    public function create(array $params);

    public function updateById($id, array $attributes);

    public function deleteById($id, bool $force = false);

}
