<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_wali_santri');
            $table->string('nama');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->integer('nisn');
            $table->string('tempat_lahir');
            $table->time('tanggal_lahir', 0);
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
        Schema::dropIfExists('santri');
    }
}
