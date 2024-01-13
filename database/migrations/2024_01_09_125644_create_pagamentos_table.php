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
        Schema::create('pagamento', function (Blueprint $table) {
            $table->id();
            $table->float('valor', 8, 2);
            $table->unsignedBigInteger('forma_pagamento_id');
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamento');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->date('data');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('inscricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagamento', function (Blueprint $table) {
            $table->dropForeign('pagamento_forma_pagamento_id_foreign');
            $table->dropForeign('pagamento_status_id_foreign');
            $table->dropForeign('pagamento_user_id_foreign');
        });
        Schema::dropIfExists('pagamento');
    }
};
