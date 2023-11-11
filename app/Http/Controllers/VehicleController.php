<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vehicles.index', [
            'vehicles' => Vehicle::with('type')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = $request->input('type');

        $request->validate([
            'model' => ['required', 'max:255'],
            'year' => ['required', 'max:4', 'min:4'],
            'capacity' => ['required', 'max:2'],
            'manufacture' => ['required', 'max:255'],
            'price' => ['required'],
        ]);

        $vehicle = Vehicle::create([
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'capacity' => $request->input('capacity'),
            'manufacture' => $request->input('manufacture'),
            'price' => $request->input('price'),
            'type' => $type,
        ]);

        if ($type == 'Motorcycle') {
            $vehicle->motorcycle()->create([
                'trunk_area' => $request->input('trunk_area'),
                'engine_capacity' => $request->input('engine_capacity'),
            ]);
        } else if ($type == 'Truck') {
            $vehicle->truck()->create([
                'total_wheel' => $request->input('total_wheel'),
                'cargo_area' => $request->input('cargo_area'),
            ]);
        } else if ($type == 'Car') {
            $vehicle->car()->create([
                'fuel_type' => $request->input('fuel_type'),
                'trunk_area' => $request->input('trunk_area'),
            ]);
        }

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($vehicleId)
    {
        $vehicle = Vehicle::with('type')->find($vehicleId);

        return view('vehicles.update', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        $request->validate([
            'model' => ['required', 'max:255'],
            'year' => ['required', 'max:4', 'min:4'],
            'capacity' => ['required', 'max:2'],
            'manufacture' => ['required', 'max:255'],
            'price' => ['required'],
        ]);

        $vehicle->update([
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'capacity' => $request->input('capacity'),
            'manufacture' => $request->input('manufacture'),
            'price' => $request->input('price'),
        ]);

        if ($vehicle->type == 'Car') {
            $vehicle->car()->update([
                'fuel_type' => $request->input('fuel_type'),
                'trunk_area' => $request->input('trunk_area'),
            ]);
        } else if ($vehicle->type == 'Motorcycle') {
            $vehicle->motorcycle()->update([
                'trunk_area' => $request->input('trunk_area'),
                'engine_capacity' => $request->input('engine_capacity'),
            ]);
        } else if ($vehicle->type == 'Truck') {
            $vehicle->truck()->update([
                'total_wheel' => $request->input('total_wheel'),
                'cargo_area' => $request->input('cargo_area'),
            ]);
        }

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Vehicle deleted successfully.');
    }
}
