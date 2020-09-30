<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-11 04:58:00
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-25 03:50:36
 */

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'status', 'accumulated', 'avatar', 'role', 'whatsapp', 'phone', 'skype', 'business_id'
    ];

    protected $appends = ['business'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'name' => "required",
            'email' => "required",
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'name' => "required",
            'email' => "required",
        ]);
    }

    /**
     * Relation with Token and User
     */
    public function token()
    {
        return $this->hasMany('App\Token');
    }

    /*
    |------------------------------------------------------------------------------------
    | relations
    |------------------------------------------------------------------------------------
    */
    // 1:m
    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    // m:1
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    // 1:m
    public function VideoPresentations()
    {
        return $this->hasMany(VideoPresentation::class);
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


    /**
     * get Social
     */
    public function getSocial()
    {
        $user = $this->id;
        $social = Social::where('user_id', $user)->first();

        return $social;
    }

    /**
     * get Business
     */
    public function getBusiness()
    {
        $business_id = $this->business_id;
        $business = Business::find($business_id);

        return $business;
    }
}
