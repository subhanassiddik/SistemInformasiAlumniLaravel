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
            $table->string('nim')->nullable();
            $table->string('tugas_akhir')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telepon',13)->nullable();
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable();
            
            $table->year('angkatan')->nullable();
            $table->string('ipk')->nullable();            
            $table->year('tahun_lulus')->nullable();
            
            $table->tinyInteger('kerja')->default('2');
            $table->year('tahun_mulai_kerja')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('posisi')->nullable();
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
