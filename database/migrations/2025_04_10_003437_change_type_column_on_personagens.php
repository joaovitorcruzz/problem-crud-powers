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
        Schema::table('personagens', function (Blueprint $table) {
            $table->string('magic_item_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personagens', function (Blueprint $table) {
            $table->integer(column: 'magic_item_id')->change();
        });
    }
};
