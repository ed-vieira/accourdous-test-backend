<?php

namespace App\Interfaces\Repository;


interface IRepositoryBuilder {

    public function find($id, array $columns = ['*']);

    public function get(array $columns = ['*']);

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null);

    public function with(array $relations);

    public function where(array $relations);
}
