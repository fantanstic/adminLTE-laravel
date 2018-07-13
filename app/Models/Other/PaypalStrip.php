<?php
namespace App\Models\Other;

use Illuminate\Database\Eloquent\Model;

class PaypalStrip extends Model
{
    protected $table='zeai_paypal_strip';
    protected $connection='origin_mysql';
}