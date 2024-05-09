<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function allUser() {
        $users = User::where('role', 'user')->get();

        return view('pages.admin.user.index', compact('users'));
    }

    public function resetPassword($id) {
        // get user by id
        $user = User::find($id);
        $user->password = Hash::make('123456');
        $user->save();

        return redirect()->back()->with('success', 'Password reset successfully');
    }
}
