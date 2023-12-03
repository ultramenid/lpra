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
        Schema::create('csvmaster', function (Blueprint $table) {
            $table->string('provinsi')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('kec')->nullable();
            $table->string('desa_kel')->nullable();
            $table->integer('luas_ha')->nullable();
            $table->integer('subjek_kk')->nullable();
            $table->string('organisasi')->nullable();
            $table->string('status')->nullable();
            $table->string('tata_guna')->nullable();
            $table->string('tipologi')->nullable();
            $table->string('perusahaan')->nullable();
            $table->integer('orig_fig')->nullable();
            $table->string('region')->nullable();
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
        Schema::dropIfExists('csvmaster');
    }
};
