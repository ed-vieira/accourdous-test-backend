<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contract extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'property_id',
        'owner_id',
        'owner_type',
        'type',
        'text',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id', 'id')->withTrashed();
    }

    public function owner()
    {
        return $this->morphTo();
    }



}
