<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tbl_registration;
use Faker\Factory as Faker;
//use Dirape\Token\Token;
class seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $fact = Faker::create();
         
         
//         print_r($fact->image());
//         die;
         for($i=1;$i<=100;$i++)
         {
         $fake = new Tbl_registration;
         $fake->First_Name = $fact->firstName;
         $fake->Last_Name = $fact->lastName;
         $fake->email =  $fact->freeEmail;   
         $fake->mobile =  $fact->regexify('9[0-9]{9}');   
         $fake->password = base64_encode($fact->regexify('[a-z]{3,5}@[0-9]{3,4}')) ;
         $fake->gender =  $fact->randomElement(['Male', 'Female']);
         $fake->date_of_birth =  $fact->date($format = 'Y-m-d', $max = '2007-01-01');
         $fake->photo=$fact->image('D:\xampp\htdocs\Sample\storage\app\public\images',640,480,null,FALSE);
         $fake->token=$fact->regexify('[a-z 0-9]{60}');
         $fake->save();
         }
    }
}
