<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = new Role();
        $data['roles'] = $role->get_roles();
        return view('role.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->role_validate($request);
        $role = new Role();
        if($this->insert_or_update($request, $role)){
            $request->session()->flash('status', 'Role added successfully!');
            return redirect()->route('role.create');
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
        $role = Role::find($id);
        return view('role.edit', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->role_validate($request);
        if($this->insert_or_update($request, $role)){
            $request->session()->flash('status', 'Role saved successfully!');
            return redirect()->route('role.index');
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
    public function delete(Request $request, Role $role)
    {
        if($role->delete()){
            $request->session()->flash('status', 'Role has been deleted!');
            return redirect()->route('role.index');
        }
    }

    public function role_validate($request){
        return $validated = $request->validate([
            'name' => 'required|max:255'
        ]);
    }
    public function insert_or_update($request, $obj){
        $obj->name = $request->name;
        if($obj->save()){
            return true;
        }
        return false;
    }
}
