<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.kelola_pengguna.KelolaPengguna', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $units = Unit::all();
        return view('admin.kelola_pengguna.tambahPengguna', compact('users', 'units'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'unit' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        User::create([
            'nama'  => $request-> nama,
            'email'  => $request-> email,
            'role'  => $request-> role,
            'unit'  => $request-> unit,
            'password'  => Hash::make($request-> password)
            
        ]);

        return redirect('/KelolaPengguna')->with('success', 'Pengguna Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $units = Unit::all();
        return view('admin.kelola_pengguna.ubahPengguna',compact('user','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'unit' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255']
        ]);

        $user = User::find($id);

        $user->nama  = $request-> nama;
        $user->email  = $request-> email;
        $user->role  = $request-> role;
        $user->unit  = $request-> unit;

        $user->save();
            

        return redirect('/KelolaPengguna')->with('success', 'Pengguna Berhasil Diubah!');
    }

    public function updateProfil(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'unit' => ['required', 'string', 'max:255']
        ]);

        $user = User::find($id);

        $user->nama  = $request-> nama;
        $user->email  = $request-> email;
        $user->unit  = $request-> unit;

        $user->save();
            

        return back()->with('success', 'Profil Berhasil Diubah!');
    }

    public function updatePassword(Request $request, $id)
    {
        //
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::find($id);

        $user->password  = Hash::make($request-> password);

        $user->save();
            

        return back()->with('success', 'Password Berhasil Diubah!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $User = User::find($id);
        $User->delete();
        return redirect('/KelolaPengguna');
    }
}
