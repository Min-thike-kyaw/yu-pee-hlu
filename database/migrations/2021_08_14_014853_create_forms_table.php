<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->string('city');
            $table->string('acc_name');
            $table->tinyInteger('gender');
            $table->tinyInteger('gender_you_want');
            $table->string('look_you_want');
            $table->string('email');
            $table->tinyInteger('skin_tone_you_want');
            $table->tinyInteger('height_you_want');
            $table->integer('your_height_by_inch');
            $table->tinyInteger('your_body_shape');
            $table->tinyInteger('body_shape_you_want');
            $table->tinyInteger('your_look');
            $table->string('age_you_want');
            $table->string('code');
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
        Schema::dropIfExists('forms');
    }
}
