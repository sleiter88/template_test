<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-11 04:49:38
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-11 04:49:40
 */
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /*
      |------------------------------------------------------------------------------------
      | Table
      |------------------------------------------------------------------------------------
      */
      protected $table = 'socials';

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
          'social',
          'token'
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
              'user_id' => "required",
              'social' => "required",
          ];

          if ($update) {
              return $commun;
          }

          return array_merge($commun, [
              'user_id' => "required",
              'social' => "required",
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
