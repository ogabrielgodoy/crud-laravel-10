<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public readonly User $user; 
    
    public function __construct()
    {
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->user->create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'image' => $request->input('image')
        ]);
        if($created){
            return redirect()->back()->with('message', 'Sucessfully created');
        }
        return redirect()->back()->with('message', 'Error created');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //var_dump($user);
        return view('user_show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Se tiver chegando o $id na função pode se usar esta linha abaixo:
        // $user = $this->user->find($id);
        //var_dump($user);

        return view('user_edit', data:['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->user->where('id', $id)->update($request->except(['_token','_method']));

        if($updated){
            return redirect()->back()->with('message', 'Sucessfully updated');
        }
        return redirect()->back()->with('message', 'Error updated');

        //var_dump($request->except(['_token','_method']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->where('id', $id)->delete();
        return redirect()->route('users.index');
    }
}
