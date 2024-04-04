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
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('title');
      $table->string('author');
      $table->enum('status', ['pending', 'done'])->default('pending');
      $table->foreignId('book_id')->constrained('books')->onUpdate('cascade')->onDelete('cascade');
      $table->timestamps();
    });
  }
};
