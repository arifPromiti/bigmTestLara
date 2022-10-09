<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->foreignId('division');
            $table->foreignId('district');
            $table->foreignId('upazila');
            $table->string('address');
            $table->smallInteger('bangla');
            $table->smallInteger('english');
            $table->smallInteger('french');
            $table->string('photo');
            $table->string('cv');
            $table->smallInteger('training');
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
        Schema::dropIfExists('applicants');
    }
}
