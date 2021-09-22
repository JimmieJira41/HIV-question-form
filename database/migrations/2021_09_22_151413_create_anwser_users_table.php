<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnwserUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anwser_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tel');
            $table->string('anwser1');
            $table->string('anwser2');
            $table->string('anwser3');
            $table->string('anwser4');
            $table->string('anwser5');
            $table->string('anwser6');
            $table->string('anwser7');
            $table->string('anwser8');
            $table->string('anwser9');
            $table->string('anwser10');
            $table->string('anwser11');
            $table->string('anwser12');
            $table->string('anwser13');
            $table->integer('point');
            $table->timestamp("submit_at")->nullable();
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
        Schema::dropIfExists('anwser_users');
    }
}
