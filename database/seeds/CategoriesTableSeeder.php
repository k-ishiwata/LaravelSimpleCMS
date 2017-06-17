<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'slug' => 'javascript',
                'title' => 'JavaScript'
            ],[
                'slug' => 'html',
                'title' => 'HTML'
            ],[
                'slug' => 'css',
                'title' => 'CSS'
            ],[
                'slug' => 'php',
                'title' => 'PHP'
            ]
        ]);
    }
}
