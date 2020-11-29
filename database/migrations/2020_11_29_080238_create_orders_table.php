<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone')->nullable(false);
            $table->string('email')->nullable(false);
            $table->text('address')->nullable(false);
            $table->text('description')->nullable(true);
            $table->decimal('order_total', 8, 2)->default(0.00);
            $table->enum('status', ['Paid', 'Cancelled', 'Shipping'])->default('Shipping');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
