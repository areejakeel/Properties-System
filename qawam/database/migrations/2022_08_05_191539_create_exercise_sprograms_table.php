<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseSprogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_sprograms', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('sportprogram_id')->constrained('sport_programs')->cascadeOnDelete();
            $table->ForeignId('exercise_id')->constrained('exercises')->cascadeOnDelete();
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
        Schema::dropIfExists('exercise_sprograms');
    }
}
