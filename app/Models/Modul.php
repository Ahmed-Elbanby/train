<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class, 'modul_id');
    }
}
