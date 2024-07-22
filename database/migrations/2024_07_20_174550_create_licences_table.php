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
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->string('software_name');
            $table->string('vendor_name');
            $table->string('licence_type');
            $table->enum('currency', ['KSH', 'USD', 'EUR', 'GBP'])->default('KSH');
            $table->decimal('cost', 15, 2);
            $table->text('supported_service')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('days_remaining');
            $table->enum('status', ['active', 'expired'])->default('active');
            $table->text('comment')->nullable();
            $table->string('upload_files')->nullable(); // Add this line for file uploads
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licences');
    }
};
