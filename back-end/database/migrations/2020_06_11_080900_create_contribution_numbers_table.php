<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContributionNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('contribution_numbers')) {
            Schema::create('contribution_numbers', function (Blueprint $table) {
                $table->id();
                // $table->string('emp_num')->unique();
                $table->string('emp_num');
                $table->foreign('emp_num')->references('emp_num')->on('employees');
                $table->string('sss');
                $table->string('philhealth');
                $table->string('pagibig');
                $table->string('tin');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contribution_numbers');
    }
}
