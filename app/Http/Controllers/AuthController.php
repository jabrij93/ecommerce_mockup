<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Check email
        $user = User::where('email', $fields['email'])->first();

        //Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            $result = [];
            $result['status'] = false;
            $result['message'] = "Bad creds";

            return response()->json($result);
        } else {
            $result = [];
            $result['status'] = true;
            $result['message'] = "Login successfully";

            $data = [
                'id' => $user->id,
                'staff_id' => $user->staff_id,
                'name' => $user->name
            ];

            $result['data'] = $data;

            return response()->json($result);
        }
    }
}
