<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
                            'full_name',
                            'email',
                            'mobile_number',
                            'lead_source',
                            'lead_status',
                            'notes'
                        ];
}
