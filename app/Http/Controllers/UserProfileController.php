<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function getdata()
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $data = User::get();
        $result['data'] = $data;

        $result['status'] = true;
        $result['message'] = "suksess";

        return response()->json($result);
    }

    public function showdata($id)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $data = User::find($id);
        $result['data'] = $data;

        $result['status'] = true;
        $result['message'] = "suksess";

        return response()->json($result);
    }

    public function adddata(Request $r)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $users = new User;

        if ($r->hasFile('images')) {
            $file = $r->file('images');
            $name = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/profilephoto_images', $name);
            $images = $name;
        } else {
            $images = $r->images;
        }

        $users->images = $images;
        $users->staff_id = $r->staff_id;
        $users->name = $r->name;
        $users->email = $r->email;
        $users->password = bcrypt($r->get('password'));
        $users->gender = $r->gender;
        $users->department = $r->department;
        $users->phonenumber = $r->phonenumber;
        $users->company_name = $r->company_name;

        $users->save();

        $result['data'] = $users;
        $result['status'] = true;
        $result['message'] = "suksess add data";

        return response()->json($result);
    }

    public function deleteuser(Request $r)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $users = User::find($r->id);
        $users->delete();

        // $result['data'] = $users ;
        $result['status'] = true;
        $result['message'] = "suksess delete data";

        return response()->json($result);
    }

    public function updateuser(Request $r)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $users = User::findOrFail($r->id);
        $images = null;

        if ($r->hasFile('images')) {
            $file = $r->file('images');
            $name = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/profilephoto_images', $name);
            $images = $name;
        } else {
            $images = $r->images;
        }

        $users->images = $images;
        $users->staff_id = $r->staff_id;
        $users->name = $r->name;
        $users->email = $r->email;
        $users->password = bcrypt($r->get('password'));
        $users->gender = $r->gender;
        $users->department = $r->department;
        $users->phonenumber = $r->phonenumber;
        $users->company_name = $r->company_name;
        $users->save();

        $result['data'] = $users;
        $result['status'] = true;
        $result['message'] = "suksess add data";

        return response()->json($result);
    }

    public function userClockIn(Request $r)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $users = User::where('staff_id', $r->staff_id)->select(['staff_id', 'date_checkIn', 'time_checkIn', 'location_checkIn'])->first();

        $mytime = Carbon::now('Asia/Kuala_Lumpur');
        $date = $mytime->format('Y-m-d');
        $time = $mytime->format('H:i:s');

        $users->date_checkIn = $date;
        $users->time_checkIn = $time;
        $users->location_checkIn = $r->location_checkIn;

        AttendanceRecord::updateOrCreate(
            ['staff_id' => $users->staff_id, 'date_checkIn' => $date],
            $users->toArray()
        );

        $result['data'] = $users;
        $result['status'] = true;
        $result['message'] = "suksess add data";

        return response()->json($result);
    }

    public function userClockOut(Request $r)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $users = User::where('staff_id', $r->staff_id)->select(['staff_id', 'time_checkOut', 'location_checkOut'])->first();

        $mytime = Carbon::now('Asia/Kuala_Lumpur');
        $date = $mytime->format('Y-m-d');
        $time = $mytime->format('H:i:s');

        $users->date_checkIn = $date;
        $users->time_checkOut = $time;
        $users->location_checkOut = $r->location_checkOut;

        // Save the updated data to the database
        AttendanceRecord::updateOrCreate(
            ['staff_id' => $users->staff_id, 'date_checkIn' => $date],
            $users->toArray()
        );

        $result['data'] = $users;
        $result['status'] = true;
        $result['message'] = "suksess add data";

        return response()->json($result);
    }
}
