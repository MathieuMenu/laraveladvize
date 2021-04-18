<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');

        $data = User::latest()->paginate(5);
    
        return view('users.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'firstname' => 'required',
            'birth' => 'required',
        ]);
    
        User::create($request->all());
     
        return redirect()->route('users.index')
                        ->with('success','users created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $account
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit',compact('user'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required',
            'firstname' => 'required',
            'birth' => 'required',
        ]);

        $user->update($request->all());
    
        return redirect()->route('users.index')
                        ->with('success','users updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $account
     * @return \Illuminate\Http\Response
     */
    public function usercreation(User $user)
    {
        //
        return view('users.usercreation',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $account
     * @return \Illuminate\Http\Response
     */
    public function createregi(Request $request)
    {
        //
        User::create([
            'name' => $request['name'],
            'firstname' => $request['firstname'],
            'birth' => $request['birth'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect()->route('users.index')
                        ->with('success','users created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
    
        return redirect()->route('users.index')
                        ->with('success','users deleted successfully');
    }
}
