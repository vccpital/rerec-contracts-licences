<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'supported_service',
        'services',
        'start_date',
        'end_date',
        'days_remaining',
        'renewal_reminder_date',
        'upload_files',
        'status',
        'comment'
    ];
}
