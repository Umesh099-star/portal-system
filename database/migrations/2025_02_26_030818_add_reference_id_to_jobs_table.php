<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('reference_id')->nullable()->after('id'); // Unique job reference
            $table->enum('added_by', ['company', 'admin'])->after('reference_id'); // Who added the job
            $table->unsignedBigInteger('company_id')->nullable()->after('added_by'); // Link admin jobs to company
        });
    }

    public function down(): void {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['reference_id', 'added_by', 'company_id']);
        });
    }
};