<?php

namespace App\Console\Commands;

use App\Models\Inscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class DeleteExpiredInscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inscriptions:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove expired inscriptions from database.';

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
        $inscriptions = Inscription::whereNull('confirmed_at');

        $inscriptions->each(function ($inscription) {
            $created = Date::createFromFormat('Y-m-d H:i:s', $inscription->created_at);
            $midDate = Date::createMidnightDate($created->year, $created->month, $created->day);
            $now = now();
            $midNow = Date::createMidnightDate($now->year, $now->month, $now->day);
            // TODO -> esta cantidad de días la pone Edeblangel, toca preguntar
            if($midDate->diffInDays($midNow) >= 3) {
                $inscription->delete();
            }
        });
        echo "Pruned successfully.\n";
        return 0;
    }
}
