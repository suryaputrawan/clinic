<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbhregpatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbhRegPatient', function (Blueprint $table) {
            $table->string('patNRM', 11);
            $table->string('patidCardNo', 20);
            $table->date('patRegDate')->nullable();
            $table->string('patSurename', 50);
            $table->string('patGivenname', 50);
            $table->date('patDOB')->nullable();
            $table->char('patSex', 1);
            $table->string('patAddres', 150)->nullable();
            $table->string('patPhone', 30)->nullable();
            $table->string('patEmail', 40)->nullable();
            $table->foreignId('nationality_nationID');
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
        Schema::dropIfExists('tbhRegPatient');
    }
}
