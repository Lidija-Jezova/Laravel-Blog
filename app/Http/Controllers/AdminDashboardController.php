<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\User;
use App\Role;

class AdminDashboardController extends Controller
{
    public function attachRole(Request $request, User $user)
    {
        $role = $request->input('roles');
        if (Gate::allows('attach-role')) {
            $user->roles()->attach($role);
            return redirect()->route('users.dashboard');
        }
    }

    public function detachRole(Request $request, User $user)
    {
        $role = $request->input('roles');
        if (Gate::allows('detach-role')) {
            $user->roles()->detach($role);
            return redirect('users.dashboard');
        }
    }
}
