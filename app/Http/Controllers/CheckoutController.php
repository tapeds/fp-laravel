<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Passenger;
use App\Models\Penerbangan;
use Illuminate\Http\Request;
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
                'name.*' => 'required|string|max:100',
                'nik.*' => 'required|string|max:16',
                'penerbangan_id' => 'required|integer|exists:penerbangans,id',
            ]);

            $userId = auth()->id();

            // Start a database transaction to ensure data consistency
            DB::beginTransaction();

            // Create the Tiket record
            $tiket = Tiket::create([
                'user_id' => $userId,
                'penerbangan_id' => $validatedData['penerbangan_id'],
            ]);

            // Create Passenger records
            foreach ($validatedData['name'] as $index => $name) {
                Passenger::create([
                    'tiket_id' => $tiket->id,
                    'name' => $name,
                    'nik' => $validatedData['nik'][$index],
                ]);
            }

            // Calculate the number of passengers
            $numPassengers = count($validatedData['name']);

            // Subtract the number of passengers from the kapasitas in the penerbangans table
            $penerbangan = Penerbangan::find($validatedData['penerbangan_id']);
            if ($penerbangan->kapasitas < $numPassengers) {
                // If there are not enough seats available, throw an exception
                throw new \Exception('Not enough capacity available for the selected flight.');
            }

            // Update the kapasitas by subtracting the number of passengers
            $penerbangan->kapasitas -= $numPassengers;
            $penerbangan->save();

            // Commit the transaction
            DB::commit();

            $flights = Penerbangan::with([
                'tikets.user',
                'maskapai',
            ])
                ->whereHas('tikets', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->get();

            // Return the view with the success message
            return view('pesanan', [
                'message' => 'Data submitted successfully!',
                'submittedData' => $validatedData,
                'daftar_penerbangan' => $flights
            ]);
        } catch (ValidationException $e) {
            // Handle validation exception
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Rollback the transaction in case of any exception
            DB::rollBack();
            // Handle other exceptions (like database errors)
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
