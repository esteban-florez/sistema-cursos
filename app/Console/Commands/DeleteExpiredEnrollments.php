<?php

namespace App\Console\Commands;

use App\Models\Enrollment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class DeleteExpiredEnrollments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enrollments:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove expired enrollments from database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $enrollments = Enrollment::expired()->get();

        $enrollments->each(fn($enrollment) => $enrollment->delete());

        echo "Removed expired enrollments successfully.\n";
        return 0;
    }
}
