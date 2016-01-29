<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_number')->unique();
            $table->string('job_description');
            $table->string('client_code');
            $table->decimal('actual_fees', 10, 2);
            $table->decimal('actual_expenses', 10, 2);
            $table->decimal('actual_total', 10, 2);
            $table->decimal('actual_support_config', 10, 2);
            $table->decimal('actual_by_job_function', 10, 2);
            $table->decimal('po_fees', 10, 2);
            $table->decimal('po_expenses', 10, 2);
            $table->decimal('sow_fees', 10, 2);
            $table->decimal('sow_expenses', 10, 2);
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
        Schema::drop('finance_data');
    }
}
