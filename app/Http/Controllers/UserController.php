<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = new User();
        $data['users'] = $user->get_users();
        return view('user.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->user_validate($request);
        $user = new User();
        if($this->user_insert_or_update($request, $user)){
            $request->session()->flash('status', 'User added successfully!');
            return redirect()->route('user.create');
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
        $user = User::find($id);
        return view('user.edit', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->user_validate($request);
        if($this->user_insert_or_update($request, $user)){
            $request->session()->flash('status', 'User saved successfully!');
            return redirect()->route('user.index');
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
    public function delete(Request $request, User $user)
    {
        if($user->delete()){
            $request->session()->flash('status', 'User has been deleted!');
            return redirect()->route('user.index');
        }
    }

    public function user_validate($request){
        return $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,id|email',
            'password' => 'sometimes|required|min:3|confirmed',
            'password_confirmation' => 'sometimes|required|min:3'
        ]);
    }
    public function user_insert_or_update($request, $obj){
        $obj->name = $request->name;
        $obj->email = $request->email;
        if(isset($request->password)){
            $obj->password = Hash::make($request->password);
        }
        if($obj->save()){
            return true;
        }
        return false;
    }
}
