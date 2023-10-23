<?php

use App\Enums\TodoStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longtext('description')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->unsignedTinyInteger('status')->default(TodoStatus::PENDING)->comment('pending= 1, procesing= 2,complete= 3');
            $table->longtext('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
