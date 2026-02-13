<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function akunadmin($id)
    {
        $data = User::find($id);
        return view('admin.akun.index', compact('data'));
    }

    public function akunkonselor($id)
    {
        $data = User::find($id);
        
        return view('konselor.akun.index', compact('data'));
    }

    public function gantiPassword(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'password_baru' => 'string|required',
                'password_lama' => 'string|required',
                'id' => 'required'
            ],
            [],
            [
                'password_baru' => 'Password Baru',
                'password_lama' => 'Password Lama'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        #Match The Old Password
        if (!Hash::check($request->password_lama, auth()->user()->password)) {
            return response()->json([
                'error' => ["Password Lama Salah!"]
            ]);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return response()->json(['success' => 'Password Baru berhasil disimpan.']);
    }
}
