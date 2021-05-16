<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
   private array $posts = [
      [
         'testo' => 'Primo Post',
         'foto' => '2021_05_05_16_43_53.svg',
         'utente' => 12
      ],
   ];
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      foreach($this->posts as $post)
         DB::table('Post')
            ->insert($post);
   }
}
