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
        $enrollments = Enrollment::whereNull('confirmed_at');

        $enrollments->each(function ($enrollment) {
            $created = Date::createFromFormat('Y-m-d H:i:s', $enrollment->created_at);
            $midDate = Date::createMidnightDate($created->year, $created->month, $created->day);
            $now = now();
            $midNow = Date::createMidnightDate($now->year, $now->month, $now->day);
            // TODO -> esta cantidad de días la pone Edeblangel, toca preguntar
            if($midDate->diffInDays($midNow) >= 3) {
                $enrollment->delete();
            }
        });
        echo "Removed expired enrollments successfully.\n";
        return 0;
    }
}
