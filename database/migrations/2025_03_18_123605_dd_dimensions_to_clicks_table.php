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
        Schema::table('clicks', function (Blueprint $table) {

            $table->integer('window_width')->nullable();
            $table->integer('window_height')->nullable();
            $table->integer('document_width')->nullable();
            $table->integer('document_height')->nullable();
            $table->foreignId('web_sites_id')->nullable()->constrained('web_sites')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clicks', function (Blueprint $table) {

        });
    }
};
