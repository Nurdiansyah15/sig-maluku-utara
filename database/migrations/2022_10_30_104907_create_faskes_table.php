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
        Schema::create('faskes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ruas_jalans');
            $table->integer('id_jenis_faskes');
            $table->float('lat', 15, 12);
            $table->float('lng', 15, 12);
            $table->string('tipe_jalan');
            $table->integer('lebar_jalan');
            $table->timestamp('pengadaan');
            $table->string('pemeliharaan');
            $table->string('foto')->nullable();
            $table->timestamp('garansi')->nullable();
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
        Schema::dropIfExists('faskes');
    }
};
