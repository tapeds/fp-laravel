<?php

namespace App\Http\Controllers;

use App\Models\Maskapai;
use App\Models\User;
use App\Models\Penerbangan;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin-home');
    }

    public function user(Request $request)
    {
        $search = $request->query('search');

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);
        return view('admin-user', ['users' => $users, 'search' => $search]);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function penerbangan(Request $request)
    {
        $search = $request->query('search');

        $penerbangans = Penerbangan::when($search, function ($query) use ($search) {
            return $query->where('no_penerbangan', 'like', "%{$search}%");
        })->paginate(10);
        return view('admin-penerbangan', ['penerbangans' => $penerbangans, 'search' => $search]);
    }

    public function addPenerbanganAdmin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'no_penerbangan' => 'required|string|max:255',
            'jadwal_berangkat' => 'required|date',
            'jadwal_kedatangan' => 'required|date|after:jadwal_berangkat',
            'harga' => 'required|integer',
            'kapasitas' => 'required|integer',
            'maskapai_id' => 'required', // Make sure the maskapai exists
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($request->no_penerbangan);

        Penerbangan::create([
            'no_penerbangan' => "de123",
            'jadwal_berangkat' => $request->jadwal_berangkat,
            'jadwal_kedatangan' => $request->jadwal_kedatangan,
            'harga' => $request->harga,
            'kapasitas' => $request->kapasitas,
            'maskapai_id' => $request->maskapai_id,
        ]);

        return redirect()->to('/admin/penerbangan')->with('success', 'Penerbangan created successfully.');
    }

    public function deletePenerbangan($id)
    {
        Penerbangan::destroy($id);
        return redirect()->back()->with('success', 'Penerbangan deleted successfully.');
    }

    public function updatePenerbangan(Request $request, $id)
    {
        $request->validate([
            'harga' => 'integer|min:0',
            'kapasitas' => 'integer|min:0',
            'jadwal_berangkat' => 'date',
            'jadwal_kedatangan' => 'date|after:jadwal_berangkat',
        ]);

        Penerbangan::where('id', $id)->update(['harga' => $request->harga, 'kapasitas' => $request->kapasitas, 'jadwal_berangkat' => $request->jadwal_berangkat, 'jadwal_kedatangan' => $request->jadwal_kedatangan]);

        return redirect()->to('/admin/penerbangan');
    }

    public function updateUserAdmin(Request $request, $id)
    {
        $request->validate([
            'nama' => 'string|min:1',
            'email' => 'string|email|max:255',
            'nik' => 'string|min:16|max:16',
        ]);

        User::where('id', $id)->update(['name' => $request->nama, 'email' => $request->email, 'nik' => $request->nik]);

        return redirect()->to('/admin/user');
    }
}
