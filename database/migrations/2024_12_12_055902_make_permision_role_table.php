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
        Schema::create('permisions_role', function (Blueprint $table) {
            $table->foreignId('permisions_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('role_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->cascadeOnUpdate();

            $table->primary(['permisions_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisions_role');
    }
};
