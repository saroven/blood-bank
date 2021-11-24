<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_donation', function (Blueprint $table) {
            $table->id();

            $table->foreignId('request_id')
                ->constrained('blood_request')
                ->onUpdate('cascade');

            $table->foreignId('requester_id')
                ->constrained('users')
                ->onUpdate('cascade');

            $table->foreignId('donor_id')
                ->constrained('users')
                ->onUpdate('cascade');

            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('blood_donation');
    }
}
