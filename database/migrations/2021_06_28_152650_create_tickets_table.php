<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('titre', 100)->nullable();
            $table->text('contenu')->nullable();
            $table->integer('statut')->default(1);
            $table->integer('online')->default(1);
            $table->timestamps();

            // $table->foreign('client_id')->references('id')->on('clients');
            // $table->foreign('categorie_id')->references('id')->on('categories');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
