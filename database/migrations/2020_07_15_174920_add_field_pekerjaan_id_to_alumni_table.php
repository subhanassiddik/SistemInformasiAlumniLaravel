<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldPekerjaanIdToAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->unsignedBigInteger('pekerjaan_id')->after('tahun_mulai_kerja')->nullable();
            $table->foreign('pekerjaan_id')->references('id')->on('bidang_pekerjaan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->dropForeign('alumni_pekerjaan_id_foreign');
        });
    }
}
