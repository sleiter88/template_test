<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
    |------------------------------------------------------------------------------------
    | Table
    |------------------------------------------------------------------------------------
    */
    protected $table = 'products';

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
        'product',
        'description'
    ];

    protected $appends = ['business'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'product'      => "required",
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'product'      => "required",
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
    public function features()
    {
        return $this->hasMany(Feature::class);
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
