<?php

namespace App\Http\Controllers;

use App\Models\Savepackage;
use Illuminate\Http\Request;

class SavepackageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gotra' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'package' => 'required|string',
            'price' => 'required|integer',
        ]);

        $booking = Savepackage::create($validated);
        return redirect()->route('payment.initiate.package', ['bookingId' => $booking->id]);
    }
}