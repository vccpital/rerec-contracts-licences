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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('supported_service');
            $table->text('services');
            $table->date('start_date')->nullable();;
            $table->date('end_date')->nullable();
            $table->integer('days_remaining');
            $table->date('renewal_reminder_date');
            $table->string('upload_files');
            $table->enum('status', ['active', 'expired'])->default('active');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
