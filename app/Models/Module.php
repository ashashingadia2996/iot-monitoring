<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional, if using default)
    protected $table = 'modules';

    // Fillable properties for mass assignment
    protected $fillable = [
        'name',
        'description',
        'type',
        'status',
        'last_seen',
        'location',
        'data_unit',
        'data_value',
        'operating_time',
        'data_sent_count',
        'fault_code',
        'maintenance_due',
        'manufacturer',
        'model_number',
        'firmware_version',
        'battery_level',
        'module_configuration'
    ];
    protected $casts = [
        'maintenance_due' => 'datetime', // Automatically casts to a Carbon instance
    ];

    public function histories()
    {
        return $this->hasMany(ModuleHistory::class);
    }
}
