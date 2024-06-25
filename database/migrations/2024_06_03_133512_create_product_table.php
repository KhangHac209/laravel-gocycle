<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->float('price')->unsigned();
            $table->text('short_description');
            $table->integer('qty')->unsigned();
            $table->string('shipping', 255);
            $table->float('weight')->unsigned();
            $table->string('image_url', 255);
            $table->text('description')->nullable();
            $table->text('information')->nullable();
            $table->text('review')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
