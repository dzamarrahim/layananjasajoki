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
    public function up(): void
    {
        Schema::create('detil_transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaksi_id')->unsigned();
            $table->bigInteger('layanan_id')->unsigned();
            $table->integer('qty');
            $table->double('price');
            $table->timestamps();
        });

        Schema::table('detil_transaksis', function(Blueprint $table) {
            $table->foreign('transaksi_id')->references('id')->on('transaksis')
                  ->onUpdate('cascade') ->onDelete('cascade');
            $table->foreign('layanan_id')->references('id')->on('layanans')
                  ->onUpdate('cascade') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('detil_transaksis', function(Blueprint $table) {
            $table->dropForeign('detiltransaksis_transaksi_id_foreign');
        });
   
        Schema::table('detil_transaksis', function(Blueprint $table) {
            $table->dropIndex('detiltransaksis_transaksi_id_foreign');
        });

        Schema::table('detil_transaksis', function(Blueprint $table) {
            $table->dropForeign('detiltransaksis_layanan_id_foreign');
        });
   
        Schema::table('detil_transaksis', function(Blueprint $table) {
            $table->dropIndex('detiltransaksis_layanan_id_foreign');
        });
       
        Schema::dropIfExists('detil_transaksis');

    }
};
