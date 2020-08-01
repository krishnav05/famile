<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvertedPrescriptionMedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('converted_prescription_meds', function (Blueprint $table) {
            $table->id();
            $table->string('doc_id');
            $table->string('name')->nullable();
            $table->string('frequency')->nullable();
            $table->string('duration')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('converted_prescription_meds');
    }
}
