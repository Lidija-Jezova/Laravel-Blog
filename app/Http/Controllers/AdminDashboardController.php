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
        //if (true) {
            $user->roles()->attach($role);
        }
    }

    public function detachRole(User $user)
    {
        if (Gate::allows('detach-role')) {
            # code...
        }
    }
}
