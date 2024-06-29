<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patientlist extends Model
{
    protected $fillable = ['name', 'gender', 'age', 'phone', 'address'];
}

