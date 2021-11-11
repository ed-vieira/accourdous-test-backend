<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Laravel\Passport\Passport;

class AuthTest extends TestCase
{

    public function test_login(){
        $user = factory(User::class)->create();
        Passport::actingAs($user);
        $this->assertAuthenticatedAs($user, 'api');
    }

    public function test_unauthenticated_without_passport(){
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertGuest('api');
    }

}
