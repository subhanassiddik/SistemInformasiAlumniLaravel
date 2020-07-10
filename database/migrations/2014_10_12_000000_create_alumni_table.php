<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo')->nullable();
            $table->string('name');
            $table->bigInteger('nim')->nullable();
            $table->string('tugas_akhir')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('telepon')->nullable();
            $table->char('jenis_kelamin')->nullable();
            $table->string('ipk',10)->nullable();
            $table->date('tahun_lulus')->nullable();
            $table->string('posisi',50)->nullable();
            $table->date('tahun_mulai_kerja')->nullable();
            $table->string('tanggung_jawab_khusus')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('alumni');
    }
}
