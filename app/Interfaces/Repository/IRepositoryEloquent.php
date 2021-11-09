<?php

namespace App\Interfaces\Repository;

use Illuminate\Database\Eloquent\Model;

interface IRepositoryEloquent {

    public function update(Model $model, array $attributes);

    public function delete(Model $model, bool $force = false);

    public function restore(Model $model);

}
