<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvertedPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('converted_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('doc_id');
            $table->string('patient_name')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('patient_gender')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('doctor_qualifications')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('temperature')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('hospital')->nullable();
            $table->string('consultation_date')->nullable();
            $table->string('follow_up_date')->nullable();
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
        Schema::dropIfExists('converted_prescriptions');
    }
}
