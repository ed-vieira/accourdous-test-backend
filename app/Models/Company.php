<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'cnpj',
        'name',
        'email',
        'email_verified',
    ];


    public function properties()
    {
        return $this->morphMany(Property::class, 'owner', 'owner_type', 'owner_id', 'id');
    }


    public function contracts()
    {
        return $this->morphMany(Contract::class, 'owner', 'owner_type', 'owner_id', 'id');
    }


}
