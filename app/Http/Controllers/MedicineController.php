<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    // Display list
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    // Show create form
    public function create()
    {
        return view('medicines.create');
    }

    // Store new medicine
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'medicine_name' => 'required',
            'category' => 'required',
            'batch_number' => 'required',
            'expiry_date' => 'required|date',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
        ]);

        Medicine::create($request->all());

        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicines.edit', compact('medicine'));
    }

    // Update medicine
    public function update(Request $request, $id)
    {
        $request->validate([
            'medicine_name' => 'required',
            'category' => 'required',
            'batch_number' => 'required',
            'expiry_date' => 'required|date',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->update($request->all());

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully');
    }

    // Delete medicine
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully');
    }
}
