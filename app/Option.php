<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /*
    |------------------------------------------------------------------------------------
    | Table
    |------------------------------------------------------------------------------------
    */
    protected $table = 'options';

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
        'name',
        'video',
        'feature_id'
    ];

    protected $appends = ['feature'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'name'      => "required",
            'video'      => "required",
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'name'      => "required",
            'video'      => "required",
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | relations
    |------------------------------------------------------------------------------------
    */
    // m:1
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    // // 1:m
    // public function Video_make()
    // {
    //     return $this->hasMany(VideoMake::class);
    // }

    /*
    |------------------------------------------------------------------------------------
    | functions
    |------------------------------------------------------------------------------------
    */

    public function getFeatureAttribute()
    {
        return Feature::where('id', $this->feature_id)->first();
    }
}
