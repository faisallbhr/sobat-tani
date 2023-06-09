<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stat_vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('vacancy_id');
            $table->boolean('status');
            $table->boolean('pengerjaan');
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
        Schema::dropIfExists('stat_vacancies');
    }
};
