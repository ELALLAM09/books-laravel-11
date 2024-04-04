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
    Schema::create('books', function (Blueprint $table) {
      $table->id();
      $table->string('ISBN');
      $table->string('title');
      $table->string('author');
      $table->text('description');
      $table->string('category');
      $table->integer('price');
      $table->integer('stock');
      $table->boolean('status')->default(1);
      $table->string('image')->nullable();
      $table->timestamps();
    });
  }
};
