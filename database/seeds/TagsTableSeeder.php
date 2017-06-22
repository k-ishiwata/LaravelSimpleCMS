<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'slug' => 'laravel',
                'title' => 'Laravel'
            ],[
                'slug' => 'cakephp',
                'title' => 'CakePHP'
            ],[
                'slug' => 'symfony',
                'title' => 'Symfony'
            ],[
                'slug' => 'codeigniter',
                'title' => 'Codeigniter'
            ]
        ]);
    }
}
