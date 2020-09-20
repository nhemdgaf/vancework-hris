<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompleteAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('emp_num')->unique();
            $table->string('house_number');
            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('region');
            $table->string('zip_code');
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
        Schema::dropIfExists('complete_addresses');
    }
}
