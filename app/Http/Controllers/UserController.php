<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function show()
    {
        return view('profile');
    }

    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view(
            'kelola_staff.daftar_staff',
            [
                "users" => User::all()
            ]
        );
    }

    public function create()
    {

        return view('kelola_staff.tambah_staff');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                "nama" => "required|string",
                "username" => "required|string|unique:users,username",
                "email" => "required|email|unique:users,email",
                "nomor_telepon" => "required|string",
                "role" => "required|in:admin,staff",
                "password" => "string|min:8"
            ]
        );
        bcrypt($validateData['password']);

        try {
            User::create($validateData);

            alert()->success('Tambah User Sukses', 'Berhasil Menambahkan Data User');
            return redirect('/kelola-staff');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function edit(User $user)
    {
        return view(
            'kelola_staff.edit_staff',
            [
                "user" => $user
            ]
        );
    }

    public function update(Request $request, User $user)
    {
        // dd($request->all());
        // return $request->all();
        // return $user;

        $rulesData =
            [
                "nama" => "required|string",
                // "username" => "required|string|unique:users,username",
                // "email" => "required|email|unique:users,email",
                "nomor_telepon" => "required|string",
                "role" => "required|in:admin,staff",
            ];
        // dd($request->all());

        if ($request->email != $user->email) {
            $rulesData['email'] = "required|email|unique:users,email";
        }
        if ($request->username != $user->username) {
            $rulesData['username'] = "required|string|unique:users,username";
        }

        $validateData = $request->validate($rulesData);

        try {

            User::where('id', $user->id)->update($validateData);

            alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
            return redirect('/kelola-staff');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return $e;
        }
    }



    public function destroy(User $user)
    {
        alert()->success('Berhasil di Hapus', 'Data User Berhasil di Hapus');
        User::destroy($user->id);

        return redirect('/kelola-staff');
    }

    public function halamanGantiPassword(User $user)
    {
        return view('kelola_staff.ganti_password', ['user' => $user]);
    }

    public function gantiPassword(Request $request, User $user)
    {

        // dd($request->all());
        try {
            User::where('username', $user->username)->update([
                "password" => Hash::make($request->password)
            ]);

            alert()->success('Ganti Password Berhasil', 'Berhasil Ganti Password');
            return redirect('/kelola-staff');
        } catch (\Exception $e) {
            alert()->error('Gagal Ganti Password', 'Gagal Ganti Data');
            return $e;
        }
    }
}
