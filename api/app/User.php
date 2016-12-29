<?php
/**
 * Created by PhpStorm.
 * User: miki208
 * Date: 29/12/2016
 * Time: 20:02
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['id', 'email', 'password', 'name', 'surname', 'address', 'city', 'country', 'telephone',
        'confirmation_code', 'status'];

    public $timestamps = false;
    protected $table = 'User';
}