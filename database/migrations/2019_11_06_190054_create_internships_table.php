<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('catch_phrase')->nullable();
            $table->integer('company_id');
            $table->text('description');
            $table->text('functie_omschrijving');
            $table->text('aanbod');
            $table->text('address')->nullable();
            $table->String('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}
