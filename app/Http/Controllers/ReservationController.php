<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Cabin $cabin)
    {
        $user = Auth::user();
        return view('reservation.index', [
            'name' => 'Rezervácie',
            'info' => 'textRezervácie',
            'action' => route('reservation.store'),
            'method' => 'post',
            'user' => $user,
            'cabin' => $cabin
        ]);
    }

    public function store(Request $request) {
        $cabin = Cabin::find(request('object_id'));
        $request->validate([
            'name' => 'required',
            'user_id',
            'object_id' => 'required',
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'people' => 'required|lte:' .$cabin->capacity,
            'phone' => 'required'
        ]);

        $reservation = Reservation::create($request->all());
        $reservation->save();
        return redirect()->route('cabin');
    }

    public function show() {
        $reservations = Reservation::select('id', 'name', 'object_id', 'arrival_date', 'departure_date', 'people')
            ->where('user_id', '=', Auth::id())
            ->get();
        return view('user.profile.reservations', [
            'reservations' => $reservations
        ]);
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return back();
    }
}
