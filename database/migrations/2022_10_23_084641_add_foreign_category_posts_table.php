<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Creiamo la chiave esterna
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');
            // Dopo creiamo il vincolo
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Eliminiamo prima la relazione/vincolo
            $table->dropForeign(['category_id']);
            // Dopo Eliminiamo la chiave esterna
            $table->dropColumn('category_id');
        });
    }
}
