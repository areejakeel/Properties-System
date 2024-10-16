<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wallet_operations', function (Blueprint $table) {
            $table
                ->foreign('wallet_id')
                ->references('id')
                ->on('wallets')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallet_operations', function (Blueprint $table) {
            $table->dropForeign(['wallet_id']);
        });
    }
};
