<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Image as Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = User::latest()->paginate(10);

        return view('users.dashboard', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $regular_user = Role::where('name', 'regular_user')->first();
        $moderator = Role::where('name', 'moderator')->first();
        $admin = Role::where('name', 'administrator')->first();

        $allRoles = [$admin, $moderator, $regular_user];
        return view('users.edit', ['allRoles' => $allRoles, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
    }

    public function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    public function update_avatar(Request $request)
    {
        // Handle the user upload of avatar

        if($request->hasFile('name'))
        {
            $avatar = $request->file('name');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/') . $filename );

            $user = Auth::user();
            $image = new Avatar();
            $image->name = $filename;
            $user->image()->save($image);
        }

        return view('profile', ['user' => $user]);   
    }
}
