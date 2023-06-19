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
        Schema::table('document_shares', function (Blueprint $table) {
            $table->boolean('read')->nullable();
            $table->boolean('edit')->nullable();
            $table->boolean('delete')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('document_shares', function (Blueprint $table) {
            $table->dropColumn('read')->nullable();
            $table->dropColumn('edit')->nullable();
            $table->dropColumn('delete')->nullable();
        });
    }
};
