<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirmwareRelease extends Model
{
    protected $fillable = [
        'device_type',
        'version',
        'filename',
        'disk',
        'path',
        'release_notes',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
