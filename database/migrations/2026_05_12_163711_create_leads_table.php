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
    Schema::create('leads', function (Blueprint $table) {

        $table->id();

        $table->string('full_name');

        $table->string('email');

        $table->string('mobile_number');

        $table->enum('lead_source', [
            'Facebook',
            'Google',
            'Website',
            'Manual'
        ]);

        $table->enum('lead_status', [
            'New',
            'Follow-up',
            'Converted',
            'Lost'
        ])->default('New');

        $table->text('notes')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
