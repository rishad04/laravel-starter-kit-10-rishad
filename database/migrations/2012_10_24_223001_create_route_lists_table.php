<?php

use App\Enums\StatusEnum;
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
        Schema::create('route_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('Module Title');
            $table->string('name')->nullable()->comment('Route Name');
            $table->string('uri')->comment('Route URL');
            $table->boolean('status')->default(StatusEnum::ACTIVE->value)->comment(StatusEnum::ACTIVE->value . " = Active & " . StatusEnum::INACTIVE . " = Inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_lists');
    }
};
