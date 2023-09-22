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
        Schema::create('profilelpra', function (Blueprint $table) {
            $table->id();
            $table->string('fid')->unique();
            $table->string('img');
            $table->string('provinsi');
            $table->string('kab_kota');
            $table->string('kec');
            $table->string('desa_kel');
            $table->string('luas');
            $table->string('jumlahpetani');
            $table->string('organisasi');
            $table->string('tata_guna');
            $table->longtext('sejarahhgu');
            $table->longtext('sejarahpenguasaan');
            $table->longtext('upayamasyarakat');
            $table->longtext('analisishukum');
            $table->longtext('kesimpulan');
            $table->longtext('Rekomendasi');
            $table->integer('is_active');
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
        Schema::dropIfExists('profilelpra');
    }
};
