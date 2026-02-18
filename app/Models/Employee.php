<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'salary'];

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class, 'emp_id');
    }

    // Always Calcolate and Sends hour_cost
    protected $appends = ['hour_cost'];
    public function getHourCostAttribute()
    {
        return round($this->salary / 30 / 8, 2);
    }
}
