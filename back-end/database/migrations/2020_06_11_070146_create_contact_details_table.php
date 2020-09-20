<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('contact_details')) {
            Schema::create('contact_details', function (Blueprint $table) {
                $table->id();
                // $table->string('emp_num')->unique();
                $table->string('emp_num');
                $table->foreign('emp_num')->references('emp_num')->on('employees');
                $table->string('email_address');
                $table->string('phone_number');
                $table->string('mobile_number');
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
        Schema::dropIfExists('contact_details');
    }
}
