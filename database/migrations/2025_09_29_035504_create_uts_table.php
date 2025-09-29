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
        Schema::create('uts', function (Blueprint $table) {
            $table->id('uts_id'); // primary key
            $table->string('nama_matkul'); // nama mata kuliah
            $table->integer('jumlah_sks'); // jumlah SKS
            $table->text('keterangan')->nullable(); // keterangan, boleh kosong
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uts');
    }
};
