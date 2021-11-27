<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade');
            $table->foreignId('requested_to')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade');
            $table->string('blood_group');
            $table->tinyInteger('number_of_bags');
            $table->date('need_date');
            $table->integer('mobile');
            $table->string('location')->nullable();
            $table->foreignId('district_id')
                ->constrained()
                ->onUpdate('cascade');
            $table->foreignId('donated_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade');
            $table->date('donated_date')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('blood_request');
    }
}
