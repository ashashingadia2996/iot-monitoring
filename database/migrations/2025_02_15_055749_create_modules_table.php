<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('name'); // Module name
            $table->text('description'); // Module description
            $table->string('type'); // Type of module (e.g., temperature, speed, etc.)
            $table->string('status'); // Module status (active, inactive, faulty)
            $table->timestamp('last_seen')->nullable(); // When was the module last seen
            $table->string('location'); // Physical location of the module
            $table->string('data_unit'); // Unit of the data (e.g., °C, km/h)
            $table->float('data_value'); // Current data value (e.g., 25.6°C)
            $table->float('operating_time'); // Operating time in hours
            $table->integer('data_sent_count'); // Number of data points sent
            $table->string('fault_code')->nullable(); // Fault code if module is faulty
            $table->timestamp('maintenance_due')->nullable(); // When is maintenance due
            $table->string('manufacturer'); // Manufacturer name
            $table->string('model_number'); // Model number of the module
            $table->string('firmware_version'); // Firmware version installed
            $table->integer('battery_level'); // Battery level as a percentage
            $table->text('module_configuration')->nullable(); // Configuration settings (JSON or text)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
