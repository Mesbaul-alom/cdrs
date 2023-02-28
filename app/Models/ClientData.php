<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientData extends Model
{
    use HasFactory;
     protected $fillable = [
        'op_name',
        'setup_time',
        'called _number_in',
        'called_number',
        'start_time',
        'duration',
        'end_time',
        'op_destination',
        'cost_in',
    
    ];
}