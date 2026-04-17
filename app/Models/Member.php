<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'Member';
    protected $primaryKey = 'userid';

    public $timestamps = false;

    protected $fillable = [
        'firstname', 'surname', 'membertype', 'dateofbirth'
    ];

    protected $hidden = [
        'userid', 'created_at', 'updated_at', 'deleted_at'
    ];
}