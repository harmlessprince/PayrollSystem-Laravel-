<?php

use App\Deduction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            DesignationsTableSeeder::class,
            DepartmentsTableSeeder::class, 
            AccountsTableSeeder::class,
            AllowancesTableSeeder::class,
            DeductionsTableSeeder::class
        ]);
    }
}
