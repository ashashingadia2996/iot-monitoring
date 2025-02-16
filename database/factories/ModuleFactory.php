<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // Random name
            'description' => $this->faker->sentence(), // Random description
            'type' => $this->faker->randomElement(['sensor', 'controller', 'actuator']), // Random type
            'status' => $this->faker->randomElement(['active', 'inactive', 'faulty']), // Random status
            'last_seen' => $this->faker->dateTime, // Random last seen timestamp
            'location' => $this->faker->city, // Random location
            'data_unit' => $this->faker->randomElement([
                '°C', '°F', 'K',      // Temperature
                'km/h', 'mph', 'm/s', // Speed
                'Pa', 'Bar', 'PSI',   // Pressure
                'm', 'km', 'Miles',   // Distance
                'L', 'm³', 'Gallons', // Volume
                's', 'min', 'h',      // Time
                'W', 'kWh', 'J',      // Energy
                'B', 'KB', 'MB',      // Data Transfer
                'A', 'mA'             // Current
            ]),
            'data_value' => $this->faker->randomFloat(2, 20, 100), // Random data value (e.g., temperature, speed)
            'operating_time' => $this->faker->numberBetween(1, 1000), // Random operating time (hrs)
            'data_sent_count' => $this->faker->numberBetween(0, 500), // Random data sent count
            'fault_code' => $this->faker->optional()->word(), // Optional fault code
            'maintenance_due' => $this->faker->dateTimeBetween('now', '+1 year'), // Random maintenance date
            'manufacturer' => $this->faker->randomElement([
                'Samsung', 'Bosch', 'Honeywell', 'Siemens', 'Texas Instruments',
                'Panasonic', 'Intel', 'GE (General Electric)', 'Schneider Electric',
                'ABB', 'Philips', 'Hitachi', 'Mitsubishi', 'Sony', 'Toshiba', 'LG',
                'Dell', 'HP', 'Cisco', 'Fujitsu'
            ]),
            'model_number' => $this->faker->word(), // Random model number
            'firmware_version' => $this->faker->numerify('v1.0.#'), // Random firmware version
            'battery_level' => $this->faker->randomFloat(2, 0, 100), // Random battery level
            'module_configuration' => $this->faker->word(), // Random configuration
        ];
    }
}
