<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps=false;
    protected $fillable =
        ['amount', 'eSign', 'mpesa_receipt_no', 'phone_number', 'username', 'name', 'email'];
}
