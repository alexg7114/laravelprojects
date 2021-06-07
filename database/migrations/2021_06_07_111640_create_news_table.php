<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
//            $table->bigInteger('category_id');
            $table->string('title', 191);
            $table->string('image', 255)->nullable();
//            $table->string('author', 191)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('source_id')->constrained()->cascadeOnDelete();

            //todo: status
            $table->timestamps();

//            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete(); foreignId instead of 2 lines
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
