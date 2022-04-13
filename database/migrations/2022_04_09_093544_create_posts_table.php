<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            // $table->string('address');
            // $table->string('university');
            $table->timestamps();
            // $table->dateTime('dateTime', $precision = 0);
            // $table->date('date');
            // $table->year('birth_year');
            // $table->boolean('confirmed');
            // $table->enum('difficulty', ['easy', 'hard','childplay']);
            // $table->time('sunrise', $precision = 0);
        });

    
        
    }
    

   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
