<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // internal numeric ID
            $table->string('patient_id')->unique(); // visible ID with date prefix
            $table->text('first_name');   // encrypted
            $table->text('middle_name')->nullable(); // encrypted
            $table->text('last_name');    // encrypted
            $table->text('birthday');     // encrypted
            $table->text('gender');       // encrypted
            $table->text('address');      // encrypted
            $table->text('contact_number'); // encrypted
            $table->text('nationality');  // encrypted
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};