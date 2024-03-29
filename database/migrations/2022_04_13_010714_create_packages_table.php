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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('title');
            $table->string('keywords')->nullable();
            $table->text('descriptions')->nullable();
            $table->string('image')->nullable();
            $table->text('detail')->nullable();
            $table->float('price')->nullable();

            $table->integer('max_people')->nullable()->default('1');
            $table->integer('num_people')->nullable()->default('1');
            $table->integer('extra_charge')->nullable()->default('0');

            $table->integer('nights')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('tax')->nullable();
            $table->string('status',6)->default('False');
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
        Schema::dropIfExists('packages');
    }
};
