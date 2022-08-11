<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $model = User::class;

    public function run()
    {
        $users = [
            'name',
            'email',
            'password',
            'phone',
            'address',
            'gender'
        ]
    }
}