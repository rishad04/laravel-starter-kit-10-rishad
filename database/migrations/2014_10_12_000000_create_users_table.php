<?php

use App\Enums\GenderEnum;
use App\Enums\Status;
use App\Enums\StatusEnum;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('password');
            $table->date('dob')->nullable()->comment('Birth date');
            $table->tinyInteger('gender')->default(GenderEnum::MALE->value);

            $table->string('address')->nullable();

            $table->string('designations')->nullable();
            $table->longText('about')->nullable();


            $table->unsignedBigInteger('nid_number')->nullable();
            $table->foreignId('nid')->nullable()->comment('upload id')->constrained('uploads')->nullOnDelete();

            $table->timestamp('email_verified_at')->nullable()->comment('if null then verified, not null then not verified');
            $table->string('token')->nullable()->comment('Token for email/phone verification, if null then verified, not null then not verified');
            $table->longText('permissions')->nullable();

            $table->foreignId('image_id')->nullable()->comment('upload id')->constrained('uploads')->nullOnDelete();
            $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete();

            $table->tinyInteger('status')->default(StatusEnum::ACTIVE->value);

            $table->rememberToken();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
