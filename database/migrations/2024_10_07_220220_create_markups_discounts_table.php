<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('markups_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->decimal('percentage', 5, 2);
            $table->timestamps();

            $table->index(['type', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markups_discounts');
    }
};
