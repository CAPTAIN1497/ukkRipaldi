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
        Schema::create('detailpenjualans', function (Blueprint $table) {
            $table->string('iddetail');
            $table->string('idpenjualan');
            $table->string('idproduk');
            $table->string('jumlahproduk');
            $table->string('subtotal');
            $table->timestamps();
        });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpenjualans');
    }
};
