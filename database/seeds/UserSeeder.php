<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_id' => 'F6A08DA0-FFF2-4257-A62E-BD5CBE6F173D',
            'email' => 'admin@gql.com',
            'password' => '123456',
            'name' => 'admin',
            'role_id' => 1,
            'mobile' => null,
            'avatar' => 'http://127.0.0.1:8000/static/img/f778738c-e4f8-4870-b634-56703b4acafe.gif',
            'created_by' => 'F6A08DA0-FFF2-4257-A62E-BD5CBE6F173D',
            'updated_by' => 'F6A08DA0-FFF2-4257-A62E-BD5CBE6F173D'
        ]);
    }
}
