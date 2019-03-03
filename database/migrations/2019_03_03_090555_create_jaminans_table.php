<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJaminansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaminan', function (Blueprint $table) {
            $table->increments('id');
			$table->date('tgl_kirim');
			$table->string('bank_penerbit', 3);
			$table->string('alamat_bank_penerbit');
			$table->string('nomor_jaminan',30)->unique();
			$table->string('nomor_ref',30)->nullable();
			$table->string('jenis_jaminan',2);
			$table->string('jenis_produk',1);
			$table->string('beneficary',25);
			$table->string('unit_pengguna');
			$table->string('applicant');
			$table->string('no_kontrak',30);
			$table->string('uraian_pekerjaan')->nullable();
            $table->string('currency',3);
			$table->float('nilai_jaminan', 17, 2);
			$table->date('tgl_terbit');
			$table->date('tgl_berlaku');
			$table->date('tgl_berakhir');
			$table->date('tgl_claim')->nullable();
			$table->string('nama_file_jaminan');
            $table->string('nama_user');
            $table->string('email',50);
			$table->string('no_validity',30)->nullable();
			$table->string('penanda_tangan')->nullable();
			$table->string('jabatan_penanda_tangan')->nullable();
			$table->date('tgl_konfirmasi')->nullable();
			$table->string('nama_file_validity')->nullable();
			$table->integer('status');
            $table->timestamps();
           $table->index(['id', 'nomor_jaminan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jaminan');
    }
}
