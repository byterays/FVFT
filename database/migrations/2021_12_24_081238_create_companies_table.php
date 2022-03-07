<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id')->unique('id');
            $table->string('company_name', 50);
            $table->text('company_logo');
            $table->text('company_banner');
            $table->unsignedBigInteger('user_id')->index('const_user_company');
            $table->string('company_phone', 15);
            $table->string('company_email', 50);
            $table->unsignedBigInteger('industry_id');
            $table->text('company_details');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->string('company_address', 50);
            $table->boolean('is_active');
            $table->double('is_featured');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
