<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Tabella Ponte Post/Tag
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {

            // Vengono create le chiavi esterne
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            // Viene creato il vincolo con la tabella d'origine
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            // Vengono inserite entrambe come primary key
            $table->primary(['post_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
