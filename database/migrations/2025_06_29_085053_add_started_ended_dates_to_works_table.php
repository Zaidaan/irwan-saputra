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
        Schema::table('works', function (Blueprint $table) {
            // Drop 'timeline' (it should exist now from the previous migration)
            $table->dropColumn('timeline');

            // Add the new date columns
            $table->date('started_at')->nullable()->after('title');
            $table->date('ended_at')->nullable()->after('started_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('works', function (Blueprint $table) {
            // For rollback, drop the new columns
            $table->dropColumn('started_at');
            $table->dropColumn('ended_at');

            // And re-add 'timeline' if it was originally there
            $table->string('timeline')->nullable()->after('ended_at'); // Position it back if desired
        });
    }
};