<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailMessage extends Model
{
    protected $fillable = [
    	'email_address',
    	'message'
    ];
}
