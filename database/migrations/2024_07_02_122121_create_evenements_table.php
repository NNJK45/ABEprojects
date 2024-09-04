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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('programme_id')->nullable();
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->string('lieu');
            $table->date('date');
            $table->integer('année-event');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
