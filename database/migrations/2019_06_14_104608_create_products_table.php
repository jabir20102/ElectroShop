<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  //php artisan migrate:fresh
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->string('title');
            $table->string('description');
            $table->string('details');
            $table->string('colors');
            $table->string('category');
            $table->string('brand');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('visits');
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
        Schema::dropIfExists('products');
    }
}
