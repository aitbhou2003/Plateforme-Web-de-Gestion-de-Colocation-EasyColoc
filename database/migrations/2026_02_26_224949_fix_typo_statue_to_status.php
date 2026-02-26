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
        Schema::table('collocations', function (Blueprint $table) {
            $table->dropColumn('statue');
        });

        Schema::table('collocations', function (Blueprint $table) {
            $table->boolean('status')->default(true);
        });

        Schema::table('collocation_user', function (Blueprint $table) {
            $table->dropColumn('statue');
        });

        Schema::table('collocation_user', function (Blueprint $table) {
            $table->boolean('status')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('collocations', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->string('statue')->nullable();
        });

        Schema::table('collocation_user', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->string('statue')->nullable();
        });
    }
};
