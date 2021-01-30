<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantTheaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_theater', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theater_id');
            $table->foreign('theater_id')
                ->references('id')->on('theaters')
                ->onDelete('restrict');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')
                ->references('id')->on('packages')
                ->onDelete('restrict');
            $table->unsignedBigInteger('merchant_id');
            $table->foreign('merchant_id')
                ->references('id')->on('merchants')
                ->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('amount', 8, 2);
            $table->string('ad_duration', 100);
            $table->integer('no_of_shows');
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
        Schema::dropIfExists('merchant_theater');
    }
}
