<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //数据填充
        $data = [
            [
                'link_name' => "广东轻院",
                'link_title' => "国家示范性高职院校",
                'link_url' => "http://www.gdqy.edu.cn",
                'link_order' => 1
            ],
            [
                'link_name' => "广东轻工职教集团",
                'link_title' => "广东省示范性职教集团",
                'link_url' => "http://zjjt.gdqy.edu.cn/",
                'link_order' => 2
            ]
        ];
        DB::table('links')->insert($data);
    }
}
