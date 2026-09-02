<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('evenements', function (Blueprint $table) {
            $table->renameColumn('année-event', 'annee_event');
        });

        if (Schema::hasTable('user') && ! Schema::hasTable('legacy_users')) {
            Schema::rename('user', 'legacy_users');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('legacy_users') && ! Schema::hasTable('user')) {
            Schema::rename('legacy_users', 'user');
        }

        Schema::table('evenements', function (Blueprint $table) {
            $table->renameColumn('annee_event', 'année-event');
        });
    }
};
