<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    use HasFactory;
    protected $fillable = [
        'software_name',
        'vendor_name',
        'licence_type',
        'cost',
        'supported_service',
        'start_date',
        'end_date',
        'days_remaining',
        'status',
        'comment',
        'currency'
    ];
}
