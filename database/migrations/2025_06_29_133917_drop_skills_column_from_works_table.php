// database/migrations/YYYY_MM_DD_XXXXXX_drop_skills_column_from_works_table.php

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
            if (Schema::hasColumn('works', 'skills')) {
                $table->dropColumn('skills'); // Drop the JSON skills column
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            // On rollback, re-add the skills column as JSON
            $table->json('skills')->nullable();
        });
    }
};