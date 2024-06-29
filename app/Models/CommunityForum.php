<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class communityforum extends Model
{
    protected $table = 'communityforums';

    protected $fillable = [
        'topic',
    ];

}