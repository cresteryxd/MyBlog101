<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'link_name' =>'Google',
                'link_title' =>'search engine',
                'link_url' =>'http://www.google.com',
                'link_order' => 1
            ],
            [
                'link_name' =>'Amazon',
                'link_title' =>'Ecommerce',
                'link_url' =>'http://www.amazon.com',
                'link_order' => 2
            ]
        ];
        DB::table('links')->insert($data);

    }
}
