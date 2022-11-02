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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('isbn', 128)->nullable()->index();
            $table->string('authors', 100)->nullable()->index();
            $table->string('country', 100)->nullable()->index();
            $table->bigInteger('number_of_page')->nullable()->index();
            $table->string('publisher', 100)->nullable()->index();
            $table->string('release_date', 100)->nullable()->index();
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
        Schema::dropIfExists('book');
    }
};
