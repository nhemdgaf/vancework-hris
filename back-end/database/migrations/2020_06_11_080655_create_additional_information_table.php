<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('additional_information')) {
            Schema::create('additional_information', function (Blueprint $table) {
                $table->id();
                // $table->string('emp_num')->unique();
                $table->string('emp_num');
                $table->foreign('emp_num')->references('emp_num')->on('employees');
                $table->string('m_first_name');
                $table->string('m_last_name');
                $table->string('m_middle_name')->nullable();
                $table->string('m_suffix')->nullable();
                $table->string('e_contact_person');
                $table->string('e_mobile_number');
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
        Schema::dropIfExists('additional_information');
    }
}
