<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use App\Models\User;

class PropertyTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_visit_properties(){
        $this->visitProperties();
    }

    public function test_create_property() {
        $this->createProperty();
    }




    protected function createProperty()
    {
        $user = User::first();
        $input = $this->propertyInput();
        if(isset($user)){
            Passport::actingAs($user);
            $response = $this->postJson('/api/properties', $input);
            $response->assertStatus(201);
        } else {
            $response = $this->postJson('/api/properties', $input);
            $response->assertStatus(401);
        }

    }

    public function visitProperties()
    {
        $user = User::first();
        if(isset($user)){
            Passport::actingAs($user);
            $response = $this->getJson('/api/properties');
            $response->assertStatus(200);
        } else {
            $response = $this->getJson('/api/properties');
            $response->assertStatus(401);
        }
    }



    protected function propertyInput(): array {
        $faker = \Faker\Factory::create("pt_BR");
        $input['title'] = $faker->sentence(3);
        $input['description'] = $faker->sentence(8);
        $input['email'] = $faker->safeEmail;
        $input['cep'] =  $faker->postcode;
        $input['state'] = $faker->stateAbbr;
        $input['city'] = $faker->city;
        $input['district'] = $faker->citySuffix;
        $input['street'] = $faker->streetName;
        $input['number'] = $faker->numberBetween(1, 300);
        $input['complement'] = $faker->sentence(10);
        return $input;
    }



}
