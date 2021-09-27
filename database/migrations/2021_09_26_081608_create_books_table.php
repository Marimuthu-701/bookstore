<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Book Name');
            $table->bigInteger('author_id')->unsigned()->comment('Author Id');
            $table->bigInteger('category_id')->unsigned()->comment('Book Category');
            $table->string('slug')->nullable()->comment('Slug');
            $table->decimal('price', 8, 2)->comment('Phone Number');
            $table->bigInteger('pages')->comment('Page No');
            $table->string('media')->nullable()->comment('Media Name');
            $table->string('publication')->comment('Publication');
            $table->string('edition')->nullable()->comment('Edition');
            $table->boolean('in_stock')->default(1)->comment('In Stock');
            $table->boolean('status')->default(1)->comment('Status 1-Active, 0-Inactive');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
