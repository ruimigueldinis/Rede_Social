<?php

// php artisan make:migration add_order_to_messages_table

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
        Schema::table('messages', function (Blueprint $table) {
            // Adiciona uma coluna 'order' do tipo inteiro na tabela 'messages',
            //com valor padrão 0, para controlar a ordem das mensagens,
            // posicionando-a após a coluna 'text'.

            $table->integer('order')->default(0)->after('text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
