<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesAndEstimateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('master_estimate_id');
            $table->boolean('is_current');
            $table->integer('client_id');
            $table->integer('brand_id');
            $table->enum('region', ['US', 'Global']);
            $table->string('project_type', 64);
            $table->string('estimate_name', 64);
            $table->integer('job_number');
            $table->string('level', 16);
            // $table->string('support_config');
            $table->date('milestone_0');
            $table->date('milestone_25');
            $table->date('milestone_50');
            $table->date('milestone_75');
            $table->date('milestone_100');
            $table->enum('status', ['Open', 'Suspended', 'Restarted', 'Canceled', 'Complete', 'Closed']);
            $table->string('revisions');
            $table->string('comment');
            $table->timestamps();
        });

        Schema::create('estimate_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estimate_id');
            $table->string('job_function');
            $table->string('location');
            $table->string('job_title');
            $table->decimal('rate', 10, 2);
            $table->integer('hours');
            $table->decimal('allocation', 10, 2);
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
        Schema::drop('estimates');
        Schema::drop('estimate_items');
    }
}
