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
    Schema::create('transactions', function (Blueprint $table) {
      $table->id();
      $table->foreignId('product_id');
      $table->string('full_name');
      $table->enum('role', ["siswa", "guru"]);
      $table->string('nisn')->nullable();
      $table->date('borrowing_date')->useCurrent();
      $table->date('deadline_date');
      $table->enum('status', ["pending", "success"]);
      $table->string('quantity');
      $table->string('signature');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('transactions');
  }
};
