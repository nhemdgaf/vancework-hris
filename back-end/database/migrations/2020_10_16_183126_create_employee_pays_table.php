<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_pays', function (Blueprint $table) {
            $table->id();
            // $table->$table->string('emp_num');
            $table->string('emp_num');
            $table->decimal('reg_hours', 8, 2);
            $table->decimal('late', 8, 2);
            $table->decimal('reg_ot', 8, 2);
            $table->decimal('rest', 8, 2);
            $table->decimal('rest_ot', 8, 2);
            $table->decimal('legal_hol', 8, 2);
            $table->decimal('legal_hol_ot', 8, 2);
            $table->decimal('rest_legal_hol', 8, 2);
            $table->decimal('rest_legal_hol_ot', 8, 2);
            $table->decimal('spl_hol', 8, 2);
            $table->decimal('spl_hol_ot', 8, 2);
            $table->decimal('rest_spl_hol', 8, 2);
            $table->decimal('rest_spl_hol_ot', 8, 2);
            $table->decimal('nd', 8, 2);
            $table->decimal('nd_ot', 8, 2);
            $table->decimal('nd_rest', 8, 2);
            $table->decimal('nd_rest_ot', 8, 2);
            $table->decimal('nd_legal_hol', 8, 2);
            $table->decimal('nd_legal_hol_ot', 8, 2);
            $table->decimal('nd_rest_legal_hol', 8, 2);
            $table->decimal('nd_rest_legal_hol_ot', 8, 2);
            $table->decimal('nd_spl_hol', 8, 2);
            $table->decimal('nd_spl_hol_ot', 8, 2);
            $table->decimal('nd_rest_spl_hol', 8, 2);
            $table->decimal('nd_rest_spl_hol_ot', 8, 2);
            $table->decimal('basic_pay', 8, 2);
            $table->decimal('gross_pay', 8, 2);
            $table->decimal('sss', 8, 2);
            $table->decimal('philhealth', 8, 2);
            $table->decimal('pagibig', 8, 2);
            $table->decimal('net_pay', 8, 2);
            $table->string('cutoff_date');
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
        Schema::dropIfExists('employee_pays');
    }
}
