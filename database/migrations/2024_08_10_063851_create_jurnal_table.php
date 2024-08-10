<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jurnal', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->string('tanggal');
            $table->string('tag');
            $table->string('deskripsi');
            $table->string('akun');
            $table->string('debit');
            $table->string('kredit');
            $table->string('datalainnya1')->nullable();
            $table->string('datalainnya2')->nullable();
            $table->string('datalainnya3')->nullable();
            $table->string('datalainnya4')->nullable();
            $table->string('memo');
            $table->string('total_debit');
            $table->string('total_kredit');
            $table->string('lampiran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal');
    }
};
