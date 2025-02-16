<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'module_id',     // ID of the associated module
        'data_type',     // Type of data (e.g., temperature, speed)
        'data_value',    // Numerical value for the data
        'recorded_at',   // Timestamp when the data was recorded
    ];

    /**
     * Relationship: A history entry belongs to a module.
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
