<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'email',
        'contracted',
        'cep',
        'state',
        'city',
        'district',
        'street',
        'number',
        'complement',
    ];



    public function contract(){
        return $this->hasOne(Contract::class, 'property_id', 'id');
    }

    public function scopeAddress($query){
        return $query->select(['id','district', 'street', 'number', 'complement']);
    }

    public function scopeSearch($query, string $param){
        return $query->where('title','like',"%{$param}%")
            ->orWhere('description','like',"%{$param}%")
            ->orWhere('email','like',"%{$param}%")
            ->orWhere('cep','like',"%{$param}%")
            ->orWhere('state','like',"%{$param}%")
            ->orWhere('city','like',"%{$param}%")
            ->orWhere('district','like',"%{$param}%")
            ->orWhere('street','like',"%{$param}%");
    }

}
