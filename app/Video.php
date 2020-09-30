<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /*
    |------------------------------------------------------------------------------------
    | Table
    |------------------------------------------------------------------------------------
    */
    protected $table = 'videos';

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
        'user_id',
        'video',
        'description',
        'cta_1',
        'cta_2',
        'cta_3',
        'whatsapp',
        'skype',
        'phone'
    ];

    protected $appends = ['user'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'video' => "required",
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'video' => "required",
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | relations
    |------------------------------------------------------------------------------------
    */
    // m:1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1:m
    public function Video_make()
    {
        return $this->hasMany(VideoMake::class);
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

    public function getUserAttribute()
    {
        return User::where('id', $this->user_id)->first();
    }
}
