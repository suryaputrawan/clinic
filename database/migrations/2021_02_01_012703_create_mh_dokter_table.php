<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhDokter', function (Blueprint $table) {
            $table->smallInteger('dokterID')->autoIncrement();
            $table->string('doktername', 100);
            $table->string('dokterAddr', 80)->nullable();
            $table->string('dokterTelp', 15)->nullable();
            $table->string('dokterEmail', 50)->nullable();
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
        Schema::dropIfExists('mhDokter');
    }
}
