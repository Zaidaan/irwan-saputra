// database/migrations/YYYY_MM_DD_XXXXXX_create_skill_work_table.php

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
        Schema::create('skill_work', function (Blueprint $table) {
            $table->id(); // Optional, but good for consistent primary keys
            $table->foreignId('skill_id')->constrained()->onDelete('cascade'); // Foreign key to skills table
            $table->foreignId('work_id')->constrained()->onDelete('cascade'); // Foreign key to works table
            $table->timestamps(); // Optional, but good for pivot table tracking

            // Optional: Ensure unique combination of skill and work
            $table->unique(['skill_id', 'work_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_work');
    }
};