<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkMenuMenuItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_menu_item', function (Blueprint $table) {
            $table->foreign('menu_id')
                ->references('id')->on('menus');
            $table->foreign('menu_item_id')
                ->references('id')->on('menu_items');
            $table->foreign('parent_id')
                ->references('id')->on('menu_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_menu_item', function (Blueprint $table) {
            $table->dropForeign([
                'menu_id',
                'menu_item_id',
                'parent_id',
            ]);
        });
    }
}
