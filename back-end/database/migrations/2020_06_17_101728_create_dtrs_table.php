<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtrs', function (Blueprint $table) {
            $table->id();
            $table->string('emp_num')->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('reg_hours');
            $table->string('late_mins');
            $table->string('reg_ot');
            $table->string('rest');
            $table->string('rest_ot');
            $table->string('legal_hol');
            $table->string('legal_hol_ot');
            $table->string('rest_legal_hol');
            $table->string('rest_legal_hol_ot');
            $table->string('spl_hol');
            $table->string('spl_hol_ot');
            $table->string('rest_spl_hol');
            $table->string('rest_spl_hol_ot');
            $table->string('nd');
            $table->string('nd_ot');
            $table->string('nd_rest');
            $table->string('nd_rest_ot');
            $table->string('nd_legal_hol');
            $table->string('nd_legal_hol_ot');
            $table->string('nd_rest_legal_hol');
            $table->string('nd_rest_legal_hol_ot');
            $table->string('nd_spl_hol');
            $table->string('nd_spl_hol_ot');
            $table->string('nd_rest_spl_hol');
            $table->string('nd_rest_spl_hol_ot');
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
        Schema::dropIfExists('dtrs');
    }
}
