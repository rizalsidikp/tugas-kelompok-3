<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin) {
            $users = User::all();
        } else {
            $users = User::where('role', 'customer')->get();
            ;
        }


        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $request['password'] = Hash::make($request['password']);

        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin) {
            $user->create($request->all());
        } else {
            $file = $request->file('ktp');
            $path = time() . '_' . $request-> nama . '.' . $file->getClientOriginalExtension();
    
            Storage::disk('local')->put('public/images/fotoktp' . $path, file_get_contents($file));

            $users ->create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
        }


        return redirect()->route('users.index')
            ->with('success', 'customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $datauser = $user;
        return view('users.edit', compact('datauser'));
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
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $request['password'] = Hash::make($request['password']);

        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin)
        {
            $user->update($request->all());
        }
        else
        {
            if ($request->hasFile('ktp')) {
                // Delete old image
                Storage::disk('public')->delete('images/fotoktp' . $user->ktp);
        
                // Upload new image
                $file = $request->file('ktp');
                $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('images/fotoktp', $file, $path);
        
                // Update product with new image path
                $user->ktp = $path;

                $user ->update([
                    'name' => $request->name,
                    'role' => $request->role,
                    'email' => $request->email,
                    'password' => $request->password,
                    'ttl' => $request->ttl,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->email,
                    'ktp' => $path
                ]);
            }
        }

        return redirect()->route('users.index')
            ->with('success', 'customer Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'customer Delete successfully.');
    }
}