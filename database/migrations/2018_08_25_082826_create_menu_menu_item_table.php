<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuMenuItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_menu_item', function (Blueprint $table) {
            $table->increments('id');
                $table->integer('menu_id')->unsigned();
                $table->integer('menu_item_id')->unsigned();
                $table->integer('parent_id')->nullable()->unsigned();
                $table->integer('position')->default(0)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_menu_item');
    }
}
