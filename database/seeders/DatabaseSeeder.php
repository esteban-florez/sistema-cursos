<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(PNFSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(InstructorSeeder::class);
        $this->call(ClubSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(EnrollmentSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(MovilCredentialsSeeder::class);
        $this->call(TransferCredentialsSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
