<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(['email' => 'admin@developer.com'], [
            'name' => 'Admin',
            'password' => bcrypt('admin')
        ]);
        factory(User::class, 10)->create();
    }
}
