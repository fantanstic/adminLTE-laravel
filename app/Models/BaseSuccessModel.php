<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 17:20
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseSuccessModel extends Model
{
    protected $fillable = ['username', 'tuid', 'version', 'created_at'];
    public $timestamps = false;
}