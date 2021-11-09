<?php

namespace App\Repository\Base;

use App\Interfaces\Repository\IRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class AbstractRepository implements IRepository {

    protected $model;
    protected $with;
    protected $where;

    public function __construct(Model $model) {
        $this->model = $model;
        $this->with = [];
        $this->where = [];
    }


    public function model(){
        return $this->model;
    }

    public function with(array $with){
        $this->with = $with;
        return $this;
    }

    public function where(array $where){
        $this->where = $where;
        return $this;
    }


    public function find($id, array $columns = ['*']){
        return $this->model->where($this->where)
                ->with($this->with)
                    ->find($id, $columns);
    }

    public function get(array $columns = ['*']){
        return $this->model->where($this->where)->with($this->with)->get($columns);
    }


    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {
        $perPage = $perPage ?? $this->model->getPerPage();
        return $this->model->where($this->where)
                    ->with($this->with)
                        ->paginate($perPage, $columns, $pageName, $page);
    }


    public function create(array $params){
        return $this->model->create($params);
    }

    public function updateById($id, array $attributes){
        $model = $this->model->find($id);
        if (isset($model)) {
            return $this->update($model, $attributes);
        }
    }


    public function update(Model $model, array $attributes){
        $model->fill($attributes);
        $model->save();
        return $model;
    }


    public function delete(Model $model, bool $force = false){
        if($force){
            if (method_exists($model, 'forceDelete')) {
                $model->forceDelete();
            } else {
                $model->delete();
            }
        } else {
            $model->delete();
        }
    }


    public function deleteById($id, bool $force = false){
        $model = $this->model->find($id);
        if(isset($model)){
           $this->delete($model, $force);
        }
    }


    public function restore(Model $model){
        if (method_exists($model, 'restore')) {
            $model->restore();
        }
    }


    protected function beginTransaction(): void {
        DB::beginTransaction();
    }

    protected function commit(): void {
        DB::commit();
    }

    protected function rollback(): void {
        DB::rollBack();
    }

}
