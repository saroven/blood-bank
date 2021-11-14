<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $data = [['name' => 'Comilla'],
                ['name' => 'Feni'],
                ['name' => 'Brahmanbaria'],
                ['name' => 'Rangamati'],
                ['name' => 'Noakhali'],
                ['name' => 'Chandpur'],
                ['name' => 'Lakshmipur'],
                ['name' => 'Chattogram'],
                ['name' => 'Coxsbazar'],
                ['name' => 'Khagrachhari'],
                ['name' => 'Bandarban'],
                ['name' => 'Sirajganj'],
                ['name' => 'Pabna'],
                ['name' => 'Bogura'],
                ['name' => 'Rajshahi'],
                ['name' => 'Natore'],
                ['name' => 'Joypurhat'],
                ['name' => 'Chapainawabganj'],
                ['name' => 'Naogaon'],
                ['name' => 'Jashore'],
                ['name' => 'Satkhira'],
                ['name' => 'Meherpur'],
                ['name' => 'Narail'],
                ['name' => 'Chuadanga'],
                ['name' => 'Kushtia'],
                ['name' => 'Magura'],
                ['name' => 'Khulna'],
                ['name' => 'Bagerhat'],
                ['name' => 'Jhenaidah'],
                ['name' => 'Jhalakathi'],
                ['name' => 'Patuakhali'],
                ['name' => 'Pirojpur'],
                ['name' => 'Barisal'],
                ['name' => 'Bhola'],
                ['name' => 'Barguna'],
                ['name' => 'Sylhet'],
                ['name' => 'Moulvibazar'],
                ['name' => 'Habiganj'],
                ['name' => 'Sunamganj'],
                ['name' => 'Narsingdi'],
                ['name' => 'Gazipur'],
                ['name' => 'Shariatpur'],
                ['name' => 'Narayanganj'],
                ['name' => 'Tangail'],
                ['name' => 'Kishoreganj'],
                ['name' => 'Manikganj'],
                ['name' => 'Dhaka'],
                ['name' => 'Munshiganj'],
                ['name' => 'Rajbari'],
                ['name' => 'Madaripur'],
                ['name' => 'Gopalganj'],
                ['name' => 'Faridpur'],
                ['name' => 'Panchagarh'],
                ['name' => 'Dinajpur'],
                ['name' => 'Lalmonirhat'],
                ['name' => 'Nilphamari'],
                ['name' => 'Gaibandha'],
                ['name' => 'Thakurgaon'],
                ['name' => 'Rangpur'],
                ['name' => 'Kurigram'],
                ['name' => 'Sherpur'],
                ['name' => 'Mymensingh'],
                ['name' => 'Jamalpur'],
                ['name' => 'Netrokona']];

        District::query()->delete();
            foreach ($data as $district) {
                \DB::table('districts')->insert($district);
            }

    }
}
