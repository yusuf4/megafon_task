<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->select('id', 'name', 'lastname', 'is_admin', 'email')
            ->get();
        return Inertia::render('Users/Index', [
            'users'=>$users,
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Add');
    }

    public function store(Request $request)
    {
        //dd($request->is_admin);
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'is_admin' =>$request->is_admin,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        //dd($id);
        $userID = User::findOrFail($id);
        return Inertia::render('Users/Edit',[
            'userID'=>$userID
            ]);
    }

    public function update(Request $request, $id)
    {
        $updateUserData = $request->only(['name', 'lastname','email', 'is_admin']);
        if ($request->filled('password')){
            if ($request->filled('confirm_password')){
                $updateUserData['password']=Hash::make($request->password);
                //$updateUserData['confirm_password']=Hash::make$request->confirm_password;
            }
        }
        $user = User::findOrFail($id);
        $user->update($updateUserData);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index');

    }
}
