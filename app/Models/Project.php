<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class, 'project_id');
    }

    // Calcolate total_days
    public function getTotalDaysAttribute()
    {
        if (!$this->start_date || !$this->end_date) {
            return 0;
        }
        $start = Carbon::parse($this->start_date);
        $end = Carbon::parse($this->end_date);
        return $start->diffInDays($end) + 1;
    }
}
