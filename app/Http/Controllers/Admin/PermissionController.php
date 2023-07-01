<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.show', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
             'name' => 'required|max:50|unique:permissions',
             'for' => 'required'
        ]); 
        $permission = new Permission;
        $permission -> name = $request -> name;
        $permission -> for = $request -> for;
        $permission -> save();

        return redirect(route('admin.permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
             'name' => 'required|max:50',
             'for' => 'required',
        ]); 
        $permission = Permission::find($id);
        $permission -> name = $request -> name;
        $permission -> for = $request -> for;
        $permission -> save();

        return redirect(route('admin.permission.index'))->with('message', 'Permission Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Permission Deleted Successfully');
    }
}
