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
        Schema::disableForeignKeyConstraints();
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('lieu');
            $table->integer('placesdisponible');
            $table->enum('typeValidation',['automatic','manual']);
            $table->enum('isValidByAdmin', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->unsignedBigInteger('organizerID');
            $table->foreign('organizerID')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('categoryID');
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
