<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatelinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //通过migrat创建数据表blog_links
        Schema::create('links', function(BluePrint $table){
            $table->engine = "MyISAM";
            $table->increments("link_id");
            $table->string("link_name")->default("")->comment("//友情链接名称");
            $table->string("link_title")->default("")->comment("//友情链接标题");
            $table->string('link_url');
            $table->integer('link_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除数据表blog_links
        Schema::drop('links');
    }
}
