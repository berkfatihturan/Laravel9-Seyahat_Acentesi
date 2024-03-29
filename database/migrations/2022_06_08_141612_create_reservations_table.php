<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('package_id');
            $table->date('start_date');
            $table->integer('person')->nullable();
            $table->float('price')->nullable();
            $table->float('amount')->nullable();

            $table->string('email',50)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('id_number',20)->nullable();
            $table->string('address')->nullable();

            $table->string('IP',20)->nullable();
            $table->text('note')->nullable();
            $table->string('status',6)->default('New');
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
        Schema::dropIfExists('reservations');
    }
};
