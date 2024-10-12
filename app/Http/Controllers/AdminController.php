<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penerbangan;
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_penerbangan' => 'required|string|max:255',
            'jadwal_berangkat' => 'required|date',
            'jadwal_kedatangan' => 'required|date|after:jadwal_berangkat',
            'harga' => 'required|integer',
            'kapasitas' => 'required|integer',
            'maskapai_id' => 'required|exists:maskapis,id', // Make sure the maskapai exists
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new penerbangan
        Penerbangan::create($request->all());

        return redirect()->route('penerbangans.index')->with('success', 'Penerbangan created successfully.');
    }

    public function deletePenerbangan($id)
    {
        Penerbangan::destroy($id);
        return redirect()->back()->with('success', 'Penerbangan deleted successfully.');
    }

    public function updatePenerbangan(Request $request, $id)
    {
        $request->validate([
            'no_penerbangan' => 'string|max:255',
            'jadwal_berangkat' => 'date',
            'jadwal_kedatangan' => 'date|after:jadwal_berangkat',
            'harga' => 'integer|min:0',
            'kapasitas' => 'integer|min:0',
        ]);

        $penerbangan = Penerbangan::findOrFail($id);

        $penerbangan->update($request->all());

        return redirect()->route('penerbangan.index')->with('success', 'Penerbangan updated successfully.');
    }
}
