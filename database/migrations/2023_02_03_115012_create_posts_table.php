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
        Schema::create('posts', function (Blueprint $table) {
            //instead of writing sql syntax, we call them as functions
            $table->id();
            $table->string('title');  //('title', 100) refer to the string's length (number of characters, deleting this parameter means the length is 255)
            $table->text('description');
            $table->timestamps();
        });
    }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('posts');
    // }
};
