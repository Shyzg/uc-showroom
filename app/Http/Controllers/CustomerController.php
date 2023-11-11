<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('customers.index', [
            'customers' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'id' => ['required', 'unique:customers', 'max:16', 'min:16'],
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'phone' => ['required', 'max:15', 'min:9'],
        ]);

        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $customer = User::find($id);

        return view('customers.update', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $customer = User::find($id);

        $request->validate([
            'id' => ['required', 'unique:customers', 'max:16', 'min:16'],
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'phone' => ['required', 'max:15', 'min:9'],
        ]);

        $customer->update([
            'id' => $request->id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $customer = User::find($id);

        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
}
