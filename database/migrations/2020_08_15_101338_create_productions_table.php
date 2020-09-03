<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('product_category_id');
            $table->string('product_name');
            $table->string('serial');
            $table->unsignedBigInteger('created_by');
            $table->integer('availability')->default(1);

            // $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('supplier_id')->references('id')->on('buyers');
            $table->foreign('product_category_id')->references('id')->on('product_categories');



            // $table->foreign('supplier_id')->reference('id')->on('buyers');
            // $table->foreign('product_category_id')->reference('id')->on('product_categories');



            



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
        Schema::dropIfExists('productions');
    }
}
