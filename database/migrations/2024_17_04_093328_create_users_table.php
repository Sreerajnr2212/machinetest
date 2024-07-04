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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('fk_department');
            $table->foreign('fk_department')->references('id')->on('departments');
            $table->unsignedBigInteger('fk_designation');
            $table->foreign('fk_designation')->references('id')->on('designations');
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
        DB::table('users')->insert([
            ['name' => 'John Doe', 'fk_department' => '1', 'fk_designation' => '1', 'phone_number' => '8786543245', 'created_at' => now()],
            ['name' => 'Tommy Mark', 'fk_department' => '2', 'fk_designation' => '2', 'phone_number' => '9765473244', 'created_at' => now()],
            ['name' => 'John Doe', 'fk_department' => '1', 'fk_designation' => '1', 'phone_number' => '8786543245', 'created_at' => now()],
            ['name' => 'Tommy Mark', 'fk_department' => '2', 'fk_designation' => '2', 'phone_number' => '9765473244', 'created_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
