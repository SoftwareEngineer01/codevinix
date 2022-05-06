<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('photoUrls')->nullable();
            $table->string('tags')->nullable();
            $table->enum('status', ['available', 'pending', 'sold'])->default('available');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
