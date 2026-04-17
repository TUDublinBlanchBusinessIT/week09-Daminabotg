<?php

namespace App\Http\Controllers;

use App\Models\Member as Member;
use App\Models\Booking as Booking;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        //
    }

    public function showAllMembers()
    {
        $members = Member::all();
        return response()->json($members);
    }

    public function showOneMember($id)
    {
        return response()->json(Member::find($id));
    }

    public function showMemberBookings($id)
    {
        $bookings = Booking::all()->where('memberid', $id);
        return response()->json($bookings);
    }
}