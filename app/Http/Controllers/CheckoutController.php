<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Passenger;
use App\Models\Penerbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function notFound(Request $request)
    {
        abort(404, 'Page not found');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name.*' => 'required|string|min:10|max:100',
                'nik.*' => 'required|string|min:16|max:16',
                'penerbangan_id' => 'required|integer|exists:penerbangans,id',
            ]);

            $userId = Auth::id();
            $numPassengers = count($validatedData['name']);

            $penerbangan = Penerbangan::find($validatedData['penerbangan_id']);

            if ($penerbangan->kapasitas < $numPassengers) {
                return redirect()->back()->with('error', 'Not enough capacity available for the selected flight.')->withInput();
            }

            DB::beginTransaction();

            $tiket = Tiket::create([
                'user_id' => $userId,
                'penerbangan_id' => $validatedData['penerbangan_id'],
            ]);

            foreach ($validatedData['name'] as $index => $name) {
                Passenger::create([
                    'tiket_id' => $tiket->id,
                    'name' => $name,
                    'nik' => $validatedData['nik'][$index],
                ]);
            }

            $penerbangan->kapasitas -= $numPassengers;
            $penerbangan->save();

            DB::commit();

            return redirect()->to('/pesanan')->with('success', 'Data submitted successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while submitting checkout data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while submitting your data. Please try again later.')->withInput();
        }
    }


    public function view(Request $request, $id)
    {
        $penerbangan = Penerbangan::findOrFail($id);

        return view('checkout', [
            'penerbangan_id' => $id,
            'harga' => $penerbangan->harga,
        ]);
    }
}
