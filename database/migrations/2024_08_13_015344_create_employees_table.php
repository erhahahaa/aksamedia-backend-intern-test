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
    Schema::create('employees', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('image')->nullable();
      $table->string('name');
      $table->string('phone');
      $table->foreignUuid('division_id')->constrained('divisions')->onDelete('cascade');
      $table->string('position');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employees');
  }
};
