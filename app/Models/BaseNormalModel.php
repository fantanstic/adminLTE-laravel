<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 17:19
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BaseNormalModel extends Model
{
    protected $fillable = ['version1_count', 'version2_count', 'date', 'updated_at'];
    public $timestamps = false;
}