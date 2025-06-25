<?php

namespace App\Infrastructure\Persistence\Lead\Eloquent;

use Illuminate\Database\Eloquent\Model;

class LeadModel extends Model
{
    protected $table = 'leads';

    protected $fillable = [
        'name',
        'phone',
        'status',
        'comment',
    ];
}
