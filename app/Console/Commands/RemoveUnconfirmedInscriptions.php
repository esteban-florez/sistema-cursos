<?php

namespace App\Console\Commands;

use App\Models\Course;
use Illuminate\Console\Command;

class RemoveUnconfirmedInscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inscriptions:unconfirmed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove unconfirmed inscriptions from active Courses.';

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
        $courses = Course::all();
        $courses->reject(function ($course) {
            return $course->status === 'Inscripciones';
        })->each(function ($course) {
            $unconfirmed = $course->inscriptions()
                ->whereNull('inscriptions.confirmed_at');
            
            $unconfirmed->each(function ($inscription) {
                $inscription->delete();
            });
        });
        return 0;
    }
}
