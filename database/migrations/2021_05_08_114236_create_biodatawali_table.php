<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatawaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatawali', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users') ->onUpdate('cascade') ->onDelete('cascade');
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->string('nama_tengah')->nullable();
            $table->string('usia');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->string('telp');
            $table->text('alamat');
            $table->string('status');
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
        Schema::dropIfExists('biodatawali');
    }
}
