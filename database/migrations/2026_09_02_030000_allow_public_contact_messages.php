<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('messages', 'messages_before_public_contact');
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('sender_name')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('subject')->nullable();
            $table->text('contenu');
            $table->timestamps();
        });

        DB::statement('INSERT INTO messages (id, user_id, contenu, created_at, updated_at) SELECT id, user_id, contenu, created_at, updated_at FROM messages_before_public_contact');
        Schema::drop('messages_before_public_contact');
    }

    public function down(): void
    {
        DB::table('messages')->whereNull('user_id')->delete();
        Schema::rename('messages', 'messages_with_public_contact');
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('contenu');
            $table->timestamps();
        });

        DB::statement('INSERT INTO messages (id, user_id, contenu, created_at, updated_at) SELECT id, user_id, contenu, created_at, updated_at FROM messages_with_public_contact');
        Schema::drop('messages_with_public_contact');
    }
};
