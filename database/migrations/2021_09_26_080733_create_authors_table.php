<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Author Name');
            $table->string('email')->unique()->comment('Email');
            $table->string('phone', 30)->nullable()->comment('Phone Number');
            $table->string('slug')->nullable()->comment('Slug');
            $table->string('address')->nullable()->comment('Address');
            $table->boolean('status')->default(1)->comment('Status 1-Active, 0-Inactive');
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
        Schema::dropIfExists('authors');
    }
}
