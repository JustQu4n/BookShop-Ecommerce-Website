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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table-> string('name');
            $table -> foreignId('category_id')
                    -> constraints('category')
                    -> onUpdate('cascade')
                    -> onDelete('cascade');
            $table -> foreignId('brand_id')
                    -> constraints('brand')
                    -> onUpdate('cascade')
                    -> onDelete('cascade');
        
            $table->text('content');
            $table->text('description');
            $table->tinyInteger('status');
            $table->string('image');
            $table->string('price');
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
        Schema::dropIfExists('book');
    }
};
