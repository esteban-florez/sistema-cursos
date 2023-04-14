<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\Item;
use App\Models\Loan;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::all();
        $clubs = Club::all();

        for ($i = 0; $i < 10; $i++) { 
            $item = $items->random();
            $club = $clubs->random();
            $max = $item->stock();

            if ($max <= 3) return;

            Loan::create([
                'club_id' => $club->id,
                'item_id' => $item->id,
                'amount' => rand(1, $max - 3),
            ]);
        }

        Loan::all()->each(function ($loan) {
            $loan->update([
                'returned_at' => now(),
            ]);
        });
    }
}
