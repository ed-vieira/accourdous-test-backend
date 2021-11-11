<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use App\Models\User;
use App\Models\Property;

class ContractTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_visit_contracts(){
        $this->visitContracts();
    }


    public function test_create_contracts(){
        $this->createContract();
    }


    protected function visitContracts(){
        $user = User::first();
        if(isset($user)){
            Passport::actingAs($user);
            $this->getJson('/api/contracts')
                ->assertStatus(200);
        } else {
            $this->getJson('/api/contracts')
                ->assertStatus(401);
        }
    }

    protected function createContract(){
        $user = User::inRandomOrder()->limit(10)->first();
         $property = $this->getProperty();
        if(isset($user) && isset($property)){
            $input = $this->contractInput($property->id);
            Passport::actingAs($user);
            $response = $this->postJson('/api/contracts', $input);
            $response->assertStatus(201);
        } else {
            $this->postJson('/api/contracts', [])
                ->assertStatus(401);
        }
    }

    protected function contractInput($property_id): array {
        $type = rand(0,1);
        $faker = \Faker\Factory::create("pt_BR");
        if ($type == 0) {
            $input['cpf'] = $faker->cpf();
        } else {
            $input['cnpj'] = $faker->cnpj();
        }
        $input['ownerType'] = $type;
        $input['name'] = ($type == 0)? $faker->name : $faker->name.' Ltda';
        $input['email'] = $faker->safeEmail;
        $input['property_id'] = $property_id;
        $input['text'] = $faker->text();
        return $input;
    }

    protected function getProperty() {
        return Property::inRandomOrder()->limit(10)->first(['id']);
    }

}
