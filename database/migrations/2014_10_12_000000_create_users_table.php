<?php

use App\Enums\Gender;
use App\Enums\Status;
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
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender')->default(Gender::MALE);
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable()->comment('if null then verified, not null then not verified');
            $table->string('token')->nullable()->comment('Token for email/phone verification, if null then verified, not null then not verified');
            $table->longText('permissions')->nullable();

            $table->foreignId('upload_id')->nullable()->constrained('uploads')->nullOnDelete();
            $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete();
            $table->foreignId('designation_id')->nullable()->constrained('designations')->nullOnDelete();

            $table->tinyInteger('status')->default(Status::ACTIVE);

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
