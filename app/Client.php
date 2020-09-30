<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /*
    |------------------------------------------------------------------------------------
    | Table
    |------------------------------------------------------------------------------------
    */
    protected $table = 'clients';

    /*
    |------------------------------------------------------------------------------------
    | Primary Key
    |------------------------------------------------------------------------------------
    */
    protected $primaryKey = 'id';

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    protected $fillable = [
        'id',
        'business_id',
        'name',
        'email',
        'whatsapp',
        'phone'
    ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'name'      => "required",
            'email'      => "required",
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'name'      => "required",
            'email'      => "required",
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | relations
    |------------------------------------------------------------------------------------
    */
    // m:1
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    // 1:m
    public function client_video()
    {
        return $this->hasMany(ClientVideo::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | functions
    |------------------------------------------------------------------------------------
    */

    public function getBusinessAttribute()
    {
        return Business::where('id', $this->business_id)->first();
    }
}
