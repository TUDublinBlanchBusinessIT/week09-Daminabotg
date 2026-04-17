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

    // ✅ CREATE (POST)
    public function create(Request $request)
    {
        $arr = $request->json()->all();
        $member = new Member();
        $member->forceFill($arr);
        $member->save();
        return response()->json($member, 201);
    }

    // ✅ UPDATE (PUT)
    public function update($id, Request $request)
    {
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return response()->json($member, 200);
    }

    // ✅ DELETE
    public function delete($id)
    {
        Member::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}