<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Personal;
use Illuminate\Filesystem\Cache;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car_items = Car::all();
        // dd($car_items);
        return view('cars.index', compact('car_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personals = Personal::all();
        // dd($personals);
        return view('cars.create', compact('personals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $car_items = new Car($request->all());
        // dd($car_items);
      // $reservation_items->save();

    try {
            // 登録
            // $reservation_items->comments()->save($reservation_items);
            $car_items->save();
            return redirect()
                ->route('cars.index')
                ->with('notice', '登録しました');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        $car->fill($request->all());
        $car->save();
        return redirect()->route('cars.index', $car);
        // return view('cars.index', compact('car'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }

    public function search(CarRequest $request)
    {
        // dd($request->personal_id);
        // dd(Car::wherePersonalId($request->personal_id));
        $car = Car::wherePersonalId($request->personal_id)->latest()->first();
        return view('cars.edit', compact('car'));
    }
}
