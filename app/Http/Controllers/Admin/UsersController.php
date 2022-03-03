<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index() {
        if(auth()->user()->admin == 1) {
            $users = User::all();
            return view('admin.users.index', [
                'users' => $users,
            ]);
        } else {
            return redirect()->back();
        }

    }

    public function store(Request $request) {
        
        if(User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Er is al een gebruiker met de email: '.$request->email.'');
        } else {
            if($request->admin == "on"){
                $admin = 1;
            }else{
                $admin = 0;
            }

            $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'admin' => $admin,
            ]);
            return redirect()->back()->with('success', ''.$request->name.' is succesvol toegevoegd.');
        }
        return redirect(route('admin.users.index'));
    }

    public function update(User $user, Request $request) {
        if($request->admin == "on"){
            $attributes['admin'] = 1;
        }else{
            $attributes['admin'] = 0;
        }

        if($request->password){
            $attributes['password'] = Hash::make($request->password);
        }else{
            $attributes['password'] = $user->password;
        }

        $attributes += [
            'name' =>  $request->name,
            'email' => $request->email,
        ];
        $user->update($attributes);
        return redirect(route('admin.users.index'));
    }

    public function delete(User $user) {
        $admins = User::where('admin', 1)->count();
        if($admins == 1 && $user->admin){
            return redirect()->back()->with('error', 'Er moet altijd één Admin zijn!');
        } else {
            User::where('id', $user->id)->delete();
            return redirect()->back()->with('success', 'Gebruiker succesvol verwijderd.');
        }
    }
}