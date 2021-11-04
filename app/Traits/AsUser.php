<?php

namespace App\Traits;

use Illuminate\Contracts\Auth\Authenticatable;

trait AsUser {

    public function user():? Authenticatable {
       return auth()->user();
    }

    public function userId():? int {
        return auth()->id();
     }

}
