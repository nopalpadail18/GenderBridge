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
        Schema::create('tbl_reports', function (Blueprint $table) {
            $table->id();
            $table->string('incident_type')->nullable();
            $table->string('location_type')->nullable();
            $table->string('location_detail')->nullable();
            $table->date('incident_date');
            $table->longText('description');
            $table->enum('urgency_level', ['low', 'medium', 'high'])->default('medium');
            $table->text('evidence_links')->nullable();
            $table->enum('status', ['new', 'in_review', 'resolved', 'archived'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->string('tracking_id')->unique()->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_reports');
    }
};
