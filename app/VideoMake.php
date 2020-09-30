<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoMake extends Model
{
    /*
    |------------------------------------------------------------------------------------
    | Table
    |------------------------------------------------------------------------------------
    */
    protected $table = 'video_makes';

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
        'video_id',
        'option_id',
        'position'
    ];

    protected $appends = ['video', 'option'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'position'      => "required",
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'position'      => "required",
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | relations
    |------------------------------------------------------------------------------------
    */
    // m:1
    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    // m:1
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | functions
    |------------------------------------------------------------------------------------
    */

    public function getVideoAttribute()
    {
        return Video::where('id', $this->video_id)->first();
    }

    public function getOptionAttribute()
    {
        return Option::where('id', $this->option_id)->first();
    }
}
