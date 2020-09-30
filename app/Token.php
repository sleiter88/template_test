<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-11 05:04:57
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-11 05:05:01
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'token', 'expire_at'];
}
