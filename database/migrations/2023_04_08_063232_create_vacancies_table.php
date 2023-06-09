<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->foreignId('address_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('work_duration');
            $table->timestamp('deadline')->useCurrent();
            $table->bigInteger('salary');
            $table->text('body');
            $table->text('address_detail')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
};
