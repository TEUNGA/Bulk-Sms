<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostaldispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postaldispatches', function (Blueprint $table) {
            $table->id(); $table->string('name');
            $table->integer('reference');
            $table->string('address');
            $table->string('from_title');
            $table->string('note');
            $table->string('date');
            $table->string('attachment');
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
        Schema::dropIfExists('postaldispatches');
    }
}
