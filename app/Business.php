<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-16 03:20:44
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-25 03:51:07
 */
 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /*
    |------------------------------------------------------------------------------------
    | Table
    |------------------------------------------------------------------------------------
    */
    protected $table = 'business';

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
        'business',
        'logo',
        'status',
        'country',
        'code_zip',
        'state',
        'population',
        'adress',
        'email',
        'web',
        'whatsapp',
        'phone',
        'skype',
        'description',
        'subscription'
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
    // 1:m
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // 1:m
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | functions
    |------------------------------------------------------------------------------------
    */
    /**
     * get all users by business
     */
    public function getUser()
    {
        return User::where('business_id', $this->id)->get();
    }

    /**
     * get admins by business
     */
    public function getUserAdmin()
    {
        return User::where('business_id', $this->id)
                ->where('role', 'Admin')
                ->get();
    }

}
