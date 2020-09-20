<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('employee_profiles')) {
            Schema::create('employee_profiles', function (Blueprint $table) {
                $table->id();
                // $table->string('emp_num')->unique();
                $table->string('emp_num');
                $table->foreign('emp_num')->references('emp_num')->on('employees');
                $table->string('position');
                $table->string('date_hired');
                $table->string('store_assignment');
                $table->string('immediate_supervisor');
                $table->string('employment_status');
                $table->string('basic_pay');
                $table->string('ecola');
                $table->string('billing_group');
                $table->string('client_group');
                $table->string('mcrs');
                $table->string('payroll_code');
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
        Schema::dropIfExists('employee_profiles');
    }
}
