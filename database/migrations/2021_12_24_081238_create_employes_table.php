<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id')->unique('id');
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);
            $table->date('dob');
            $table->string('gender', 50);
            $table->string('marital_status', 50);
            $table->string('nationality', 50);
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->string('tel_phone', 20);
            $table->string('mobile_phone', 20);
            $table->unsignedBigInteger('exprience_id');
            $table->unsignedBigInteger('user_id')->index('const_user_employ');
            $table->unsignedBigInteger('functional_area_id');
            $table->integer('expected_salary');
            $table->integer('salary_currency');
            $table->string('address', 50);
            $table->boolean('is_active');
            $table->boolean('is_verified');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
            $table->text('avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
