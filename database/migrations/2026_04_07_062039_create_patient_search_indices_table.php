<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::dropIfExists('patient_search_indices'); // delete if exists
    Schema::create('patient_search_indices', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('patient_id');
        $table->text('search_text');
        $table->timestamps();

        $table->foreign('patient_id')
              ->references('id')
              ->on('patients')
              ->cascadeOnDelete();
    });
}
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_search_indices');
    }
};