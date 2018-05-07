<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('email');
            $table->integer('res1')->nullable();
            $table->integer('res2')->nullable();
            $table->integer('res3')->nullable();
            $table->integer('res4')->nullable();
            $table->integer('res5')->nullable();
            $table->integer('res6')->nullable();
            $table->integer('res7')->nullable();
            $table->integer('res8')->nullable();
            $table->integer('res9')->nullable();
            $table->integer('res10')->nullable();
            $table->integer('mark1');
            $table->integer('mark2');
            $table->integer('mark3');
            $table->integer('mark4');
            $table->integer('mark5');
            $table->integer('mark6');
            $table->integer('mark7');
            $table->integer('mark8');
            $table->integer('mark9');
            $table->integer('mark10');
            $table->integer('attempted');
            $table->integer('correct');
            $table->integer('incorrect');
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
        Schema::dropIfExists('responses');
    }
}
