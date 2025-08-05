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
            $table->foreignId('categori_id')->references('id')->on('categori')->onDelete('CASCADE');
            $table->foreignId('sub_categori_id')->references('id')->on('sub_categori')->onDelete('CASCADE');
            $table->string('name');
            $table->longText('desc_id');
            $table->longText('desc_en');
            $table->string('catalog');
            $table->string('image');
            $table->integer('sort');
            $table->enum('status', ['pending', 'draft', 'publish']);
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
