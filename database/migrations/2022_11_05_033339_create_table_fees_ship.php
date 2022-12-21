<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_ship', function (Blueprint $table) {
            $table->id();
            $table -> integer('city_id');
            $table -> integer('province_id');
            $table -> integer('wards_id');
            $table -> string('fees_ship'); 
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
        Schema::dropIfExists('table_fees_ship');
    }
};
