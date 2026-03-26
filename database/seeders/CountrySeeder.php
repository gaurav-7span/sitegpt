<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = File::get(database_path('data/countries.json'));
        $countries = json_decode($data, true);

        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }
        elseif ($driver === 'pgsql') {
            DB::statement('SET session_replication_role = replica;');
        }

        Country::truncate();

        if ($driver === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
        elseif ($driver === 'pgsql') {
            DB::statement('SET session_replication_role = DEFAULT;');
        }

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
