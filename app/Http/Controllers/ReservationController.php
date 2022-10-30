<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Personal;

use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation_items = Reservation::all();
        return view('reservations.index', compact('reservation_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = ['車A', '車B', '車C'];
        $personals = Personal::all();
        // dd($personals);
        return view('reservations.create', compact('cars', 'personals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $reservation_items = new Reservation($request->all());
        // dd($reservation_items);
      // $reservation_items->save();

    try {
            // 登録
            // $reservation_items->comments()->save($reservation_items);
            $reservation_items->save();
            return redirect()
                ->route('reservations.index')
                ->with('notice', '予約しました');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors($e->getMessage());
        }

        // return view('reservations.index', compact('reservation_items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        // dd($reservation);
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
