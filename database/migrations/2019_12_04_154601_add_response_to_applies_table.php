<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResponseToAppliesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('applies', function (Blueprint $table) {
            $table->string('response')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('applies', function (Blueprint $table) {
        });
    }
}
