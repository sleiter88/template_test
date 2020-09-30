<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientVideo extends Model
{
    /*
    |------------------------------------------------------------------------------------
    | Table
    |------------------------------------------------------------------------------------
    */
    protected $table = 'client_videos';

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
        'client_id',
        'video_id',
        'token'
    ];

    protected $appends = ['client', 'video'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'client_id'      => "required",
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'client_id'      => "required",
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | relations
    |------------------------------------------------------------------------------------
    */
    // m:1
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // m:1
    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | functions
    |------------------------------------------------------------------------------------
    */

    public function getClientAttribute()
    {
        return Client::where('id', $this->client_id)->first();
    }

    public function getVideoAttribute()
    {
        return Video::where('id', $this->video_id)->first();
    }
}
