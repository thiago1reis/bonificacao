<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        //Define os valores 
        $administrator = collect([
            [
               'full_name' => 'Thiago Alexandre Reis',
               'login' => 'thiago1reis',
               'password' => '123456'
            ] 
        ]);

        //Insere os dados no banco
        foreach ($administrator as $value) {
            Administrator::create([
              'full_name' => $value['full_name'],
              'login' => $value['login'],
              'password' => bcrypt($value['password']),
            ]);
        }   
    }
}
