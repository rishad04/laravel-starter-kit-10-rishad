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
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender')->default(Gender::MALE);
            $table->timestamp('email_verified_at')->nullable()->comment('if null then verifield, not null then not verified');
            $table->string('token')->nullable()->comment('Token for email/phone verification, if null then verifield, not null then not verified');
            $table->string('phone')->nullable()->unique();
            $table->string('password');
            $table->longText('permissions')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->tinyInteger('status')->default(Status::ACTIVE);

            $table->unsignedBigInteger('upload_id')->nullable();
            $table->foreign('upload_id')->references('id')->on('uploads')->onDelete('set null');

            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');

            $table->unsignedBigInteger('designation_id')->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('set null');

            $table->rememberToken();
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
