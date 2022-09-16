<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement', function (Blueprint $table) {
            $table->id();
            $table->enum('movement_type', ['income', 'expense']);
            $table->decimal('value');
            $table->string('note');
            $table->foreignId('employee_id')->constrained('employee')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('administrator_id')->constrained('administrator')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('movement');
    }
}
