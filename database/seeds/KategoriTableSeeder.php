<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon\Carbon::now();
        $category=['Remaja','Fiksi','Komedi','Horor','Biografi'];
        for ($i=0; $i < 5; $i++) { 
           DB::table('kategori')->insert([
                'nama'=>$category[$i],
                'created_at'=>$now
           ]);
        }
    }
}
