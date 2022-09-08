<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompancySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compancy_settings', function (Blueprint $table) {
            $table->id();
            $table->string('compancy_name')->nullable();
            $table->string('compancy_email')->nullable();
            $table->string('compancy_phone')->nullable();
            $table->string('compancy_address')->nullable();
            $table->string('office_start_time')->nullable();
            $table->string('office_end_time')->nullable();
            $table->string('break_start_time')->nullable();
            $table->string('break_end_time')->nullable();
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
        Schema::dropIfExists('compancy_settings');
    }
}
