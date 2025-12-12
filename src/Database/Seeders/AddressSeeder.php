<?php

namespace Manohar\Address\Database\Seeders;

use Illuminate\Database\Seeder;
use Manohar\Address\Models\City;
use Manohar\Address\Models\Country;
use Manohar\Address\Models\District;
use Manohar\Address\Models\Province;

class AddressSeeder extends Seeder
{
    public function run()
    {
        // Example minimal data — expand as you like
        $nepal = Country::create(['name' => 'Nepal', 'name_np' => 'नेपाल']);

        $province1 = Province::create(['name' => 'Province 1', 'name_np' => 'प्रदेश १']);

        $district1 = District::create([
            'province_id' => $province1->id,
            'name' => 'Jhapa',
            'name_np' => 'झापा',
        ]);

        City::create([
            'district_id' => $district1->id,
            'name' => 'Birtamod',
            'name_np' => 'बिर्तामोड',
        ]);
    }
}
