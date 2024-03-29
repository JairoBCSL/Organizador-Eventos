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
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->string('imagem');
            $table->string('thumbnail');
            $table->datetime('data_inicio');
            $table->datetime('data_fim');
            $table->integer('dia_unico');
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('local');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('capacidade');
            $table->float('preco', 8, 2);
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->string('qrcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evento', function (Blueprint $table) {
            $table->dropForeign('evento_user_id_foreign');
            $table->dropForeign('evento_status_id_foreign');
            $table->dropForeign('evento_local_id_foreign');
        });
        Schema::dropIfExists('evento');
    }
};
