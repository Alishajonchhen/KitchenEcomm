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
            $table->id();
            $table->string('order_no');
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(0)->comment('0-running,1-completed,2-rejected');
            $table->unsignedBigInteger('canceled_by')->nullable();
            $table->double('total', 12, 2)->default(0);
            //Grand total can be different from total if delivery charge or other extra value is added
            $table->double('grand_total', 12, 2)->default(0);
            $table->text('canceled_note')->nullable();
            $table->date('canceled_date')->nullable();
            //user who marks the order as completed
            $table->unsignedBigInteger('completed_by')->nullable();
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
