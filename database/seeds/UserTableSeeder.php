<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Inserting a User ...');
        User::create(array(
            'email' => 'amin1@teknolohiya.ph',
            'password' => Hash::make('pw1234'),
            'user_type' => 0
        ));
        $this->command->info('User table seeded ...');
    }
}
