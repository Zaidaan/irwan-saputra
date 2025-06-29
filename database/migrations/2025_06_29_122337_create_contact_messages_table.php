// database/migrations/YYYY_MM_DD_XXXXXX_create_contact_messages_table.php

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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('sender_email');
            // You can use 'enum' for fixed options, or 'string' for flexibility
            $table->string('request_type'); // e.g., 'Hourly', 'Project', 'Period contract', 'Just want to say hi'
            $table->text('description')->nullable(); // Optional field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};