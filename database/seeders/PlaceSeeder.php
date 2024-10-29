<?php
namespace Database\Seeders;
 use Illuminate\Database\Seeder;
 use App\Models\Place;
 use Illuminate\Support\Facades\DB;

    class PlaceSeeder extends Seeder
    {
        public function run()
        {
    // Datos de la base de datos

            $places = [

    
    ];
    
            foreach ($places as $place) {
                Place::create($place);
            }
        

            
    
        }  }
