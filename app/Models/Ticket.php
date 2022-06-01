<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'cus_name',
        'email',
        'phone_no',
        'problem',
        'feed_back',
        'open'
    ];
}
