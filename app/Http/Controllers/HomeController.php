<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin-index');
    }
    public function userIndex()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('users.index', compact('users'));
    }
    public function userCreate(Request $request)
    {

        return view('users.create');
    }
    public function userStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $is_admin = 0;
        if ($request->role == 'admin') {
            $is_admin = 1;
        }
        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $is_admin,
        ]);

        return redirect()->route('user.index')->with('status', 'user added succesfully');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return  redirect()->route('user.index')->with('success', 'User Deleted Succesfully');
    }
}
