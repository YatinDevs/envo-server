<?php

namespace Database\Seeders;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        Client::create([
            'name' => 'CIIDCO',
            'client' => 'City of Pharmay Pvt Ltd',
            'capacity' => '5000 Sqm',
            'description' => 'Industrial building Works - Civil, Purchase, Erection, installation and commissioning of Plant and Machinery',
            'image' => 'clients/client1.jpg'
        ]);
    }
}
