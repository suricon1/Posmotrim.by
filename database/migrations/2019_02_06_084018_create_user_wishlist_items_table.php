<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWishlistItemsTable extends Migration
{
//    public function up()
//    {
//        Schema::create('vinograd_user_wishlist_items', function (Blueprint $table) {
//            $table->integer('user_id');
//            $table->integer('product_id');
//
//            $table->primary(['user_id', 'product_id']);
//
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('product_id')->references('id')->on('vinograd_products')->onDelete('cascade');
//        });
//    }
//
//    public function down()
//    {
//        Schema::dropIfExists('vinograd_user_wishlist_items');
//    }
//
//      ALTER TABLE `vinograd_user_wishlist_items` ADD FOREIGN KEY ( `product_id` ) REFERENCES `vinograd_products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT ;
//
    public function up()
    {
        //$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        Schema::create('vinograd_product_modifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('code');
            $table->string('name');
            $table->integer('price');
            $table->integer('quantity');

//            $table->primary('code');
//            $table->primary(['product_id', 'code']);
//            $table->primary('product_id');
//            $table->foreign('product_id')->references('id')->on('vinograd_products')->onDelete('cascade');
        });
        //Schema::disableForeignKeyConstraints();

    }

    public function down()
    {
        Schema::dropIfExists('vinograd_product_modifications');
    }

}
