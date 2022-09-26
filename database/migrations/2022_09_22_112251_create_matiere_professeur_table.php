<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatiereProfesseurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere_professeur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('professeur_id');
            $table->timestamps();
            $table->foreign('matiere_id')
            ->references('id')
            ->on('matieres')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('professeur_id')
                ->references('id')
                ->on('professeurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matiere_professeur');
    }
}
