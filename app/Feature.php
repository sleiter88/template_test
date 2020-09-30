<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /*
    |------------------------------------------------------------------------------------
    | Table
    |------------------------------------------------------------------------------------
    */
    protected $table = 'features';

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
        'multi_select',
        'product_id'
    ];

    protected $appends = ['product'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'name'      => "required",
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'name'      => "required",
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | relations
    |------------------------------------------------------------------------------------
    */
    // m:1
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // 1:m
    public function Options()
    {
        return $this->hasMany(Option::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | functions
    |------------------------------------------------------------------------------------
    */

    public function getProductAttribute()
    {
        return Product::where('id', $this->product_id)->first();
    }

    public function getOptions($feature_id)
    {
        $options = Option::where('feature_id', $feature_id)->get();

        return $options;
    }
}
