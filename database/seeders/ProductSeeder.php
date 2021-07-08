<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        [
            'name'=>'Sony Bravia',
            'price'=>'30000',
            'category'=>'TV',
            'gallery'=>'https://rukminim1.flixcart.com/image/416/416/television/h/q/y/sony-klv-32w562d-original-imaernd3pbzfhhxn.jpeg',
            'description'=>'SONY Bravia 80.1 cm (32 inch) Full HD LED Smart TV ',
        ],
        [
            'name'=>'LG Fridge',
            'price'=>'35000',
            'category'=>'Fridge',
            'gallery'=>'https://rukminim1.flixcart.com/image/416/416/kbb49zk0/refrigerator-new/5/q/t/gl-t372jds3-3-lg-original-imafszefe8kbcmke.jpeg',
            'description'=>'LG 335 L Frost Free Double Door 3 Star Convertible Refrigerator ',
        ],
        [
            'name'=>'LG TV',
            'price'=>'80000',
            'category'=>'TV',
            'gallery'=>'https://images-na.ssl-images-amazon.com/images/I/81bI%2B7BWWeL._SL1500_.jpg',
            'description'=>'LG 164 cm (65 inches) 4K Ultra HD Smart IPS LED TV',
        ]]
        );
    }
}
