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

    protected $appends = ['_links'];

    public function getLinksAttribute()
    {
        return [
            'self' => app()->make('url')->to("api/members/{$this->attributes['userid']}"),
            'bookings' => app()->make('url')->to("api/member/{$this->attributes['userid']}/bookings")
        ];
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'memberid');
    }
}