<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminDeviceLogin extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name
    protected $table = 'admin_device_logins';

    // Fillable fields to allow mass assignment
    protected $fillable = ['devices'];

    // Define which columns are dates (for SoftDeletes)
    protected $dates = ['deleted_at'];
}
