<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\UsersRole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 0;
        $userRoles = DB::table('users_roles')
            ->join('users', 'users.id', '=', 'users_roles.user_id')
            ->join('roles', 'roles.id', '=', 'users_roles.role_id')
            ->get();
        return view('admin.userRoles.index', compact('userRoles', 'id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userRole = UsersRole::where('user_id', '=', $id)->get();
        $roles = Role::all();
        $user = User::findOrFail($userRole[0]->user_id);

        return view('admin.userRoles.edit', compact('userRole', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userRole = UsersRole::findOrFail($id);
        $userRole->fill($request->all());
        $userRole->save();
        return redirect()->route('admin.addRole.index');
    }

}
