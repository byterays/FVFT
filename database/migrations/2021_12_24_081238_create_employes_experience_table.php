<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes_experience', function (Blueprint $table) {
            $table->bigIncrements('id')->unique('id');
            $table->unsignedBigInteger('employ_id')->index('const_ employes_relation');
            $table->unsignedBigInteger('experiencelevels_id')->index('const_experience_relation');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes_experience');
    }
}
