<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => '最初の記事',
                'body' => '最初の記事のテキストです。',
                'category_id' => 1,
                'created_at' => '2017-05-02 14:28:19',
                'updated_at' => '2017-05-02 14:28:19'
            ],[
                'title' => '2番目の記事',
                'body' => '2番目の記事のテキストです。',
                'category_id' => 1,
                'created_at' => '2017-05-03 14:28:19',
                'updated_at' => '2017-05-03 14:28:19'
            ],[
                'title' => '3番目のお知らせ',
                'body' => '3番目の記事のテキストです。',
                'category_id' => 3,
                'created_at' => '2017-05-12 14:28:19',
                'updated_at' => '2017-05-12 14:28:19'
            ],[
                'title' => '4番目の記事',
                'body' => '4番目の記事のテキストです。',
                'category_id' => 2,
                'created_at' => '2017-05-20 14:28:19',
                'updated_at' => '2017-05-20 14:28:19'
            ],[
                'title' => '5番目のお知らせ',
                'body' => '5番目の記事のテキストです。',
                'category_id' => 2,
                'created_at' => '2017-05-23 14:28:19',
                'updated_at' => '2017-05-23 14:28:19'
            ],
        ]);
    }
}
