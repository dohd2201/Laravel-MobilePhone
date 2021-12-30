<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code")->unique();
            $table->string("slug");
            $table->integer("price");
            $table->string("image");
            $table->string("warranty");
            $table->string("accessories");
            $table->string("condition");
            $table->string("promotion");
            $table->tinyInteger("status");
            $table->text("description");
            $table->tinyInteger("featured");
            $table->bigInteger("categories_id")->unsigned();
            $table->foreign("categories_id")->references("id")->on("categories")->onDelete("cascade");
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