<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_exercises', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('exercise_id')->constrained('exercises')->cascadeOnDelete();
            $table->ForeignId('part_id')->constrained('parts')->cascadeOnDelete();

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
        Schema::dropIfExists('part_exercises');
    }
}
