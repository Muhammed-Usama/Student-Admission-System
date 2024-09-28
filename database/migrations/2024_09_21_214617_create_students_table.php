<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('gander', ['male', 'female']);
            $table->unsignedBigInteger('governorate_id');
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
            $table->string('seatnum');
            $table->string('dateofbirth');
            $table->string('nationalid');
            $table->string('address');
            $table->unsignedBigInteger('programrequirement_id');
            $table->foreign('programrequirement_id')->references('id')->on('program_requirements')->onDelete('cascade');
            $table->string('grade');
            $table->string('student_photo');
            $table->string('national_img');
            $table->unsignedBigInteger(column: 'finaldesire_id')->nullable();
            $table->foreign('finaldesire_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
