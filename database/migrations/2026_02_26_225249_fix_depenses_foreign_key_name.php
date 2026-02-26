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
        Schema::table('depenses', function (Blueprint $table) {
            $table->dropForeign(['categorie']);
            $table->dropColumn('categorie');
        });

        Schema::table('depenses', function (Blueprint $table) {
            $table->foreignId('categorie_id')->constrained('categories');
            $table->foreignId('collocation_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('depenses', function (Blueprint $table) {
            $table->dropForeign(['categorie_id']);
            $table->dropForeign(['collocation_id']);
            $table->dropColumn(['categorie_id', 'collocation_id']);
            $table->foreignId('categorie')->constrained('categories');
        });
    }
};
