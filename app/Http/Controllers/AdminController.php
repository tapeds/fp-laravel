<?php

namespace App\Http\Controllers;

use App\Models\Penerbangan;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function penerbangan(Request $request)
    {
        $search = $request->query('search');

        $penerbangans = Penerbangan::when($search, function ($query) use ($search) {
            return $query->where('no_penerbangan', 'like', "%{$search}%");
        })->paginate(10);
        return view('admin-penerbangan', ['penerbangans' => $penerbangans, 'search' => $search]);
    }
}
