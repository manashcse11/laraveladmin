<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permission = new Permission();
        $data['permissions'] = $permission->get_permissions(25);
        return view('permission.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->permission_validate($request);
        $permission = new Permission();
        if($this->insert_or_update($request, $permission)){
            $request->session()->flash('status', 'Permission added successfully!');
            return redirect()->route('permission.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permission.edit', $permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->permission_validate($request);
        if($this->insert_or_update($request, $permission)){
            $request->session()->flash('status', 'Permission saved successfully!');
            return redirect()->route('permission.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Non conventional Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Permission $permission)
    {
        if($permission->delete()){
            $request->session()->flash('status', 'Permission has been deleted!');
            return redirect()->route('permission.index');
        }
    }

    public function permission_validate($request){
        return $validated = $request->validate([
            'name' => 'required|max:255',
            'route' => 'required|max:255'
        ]);
    }
    public function insert_or_update($request, $obj){
        $obj->name = $request->name;
        $obj->route = $request->route;
        if($obj->save()){
            return true;
        }
        return false;
    }
}
