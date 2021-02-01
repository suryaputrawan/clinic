<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwabtestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swabtest', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_sampling');
            $table->date('tanggal_validasi');
            $table->time('waktu_validasi');
            $table->date('tanggal_surat');
            $table->string('nosurat', 50);
            $table->string('patient_patNRM', 11);
            $table->string('pob', 30);
            $table->smallInteger('nationality_nationID');
            $table->smallInteger('dokter_dokterID');
            $table->foreignId('laboratorium_id');
            $table->string('result', 20);
            $table->string('remarks', 50)->nullable();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('swabtest');
    }
}
