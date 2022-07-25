<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldDetaisTrOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tr_orders', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after("code_transaction");
            $table->string('address')->nullable()->after("full_name");
            $table->string('town')->nullable()->after("address");
            $table->string('phone')->nullable()->after("town");
            $table->string('email_order')->nullable()->after("phone");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tr_orders', function (Blueprint $table) {
            //
        });
    }
}
