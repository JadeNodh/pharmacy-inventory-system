<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    // Display list
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }

    // Show create form
    public function create()
    {
        return view('inventories.create');
    }

    // Store item
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required',
            'item_code' => 'required',
            'supplier_name' => 'required',
            'stock_quantity' => 'required|integer',
            'reorder_level' => 'required|integer',
            'purchase_price' => 'required|numeric',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventories.index')->with('success', 'Item added successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventories.edit', compact('inventory'));
    }

    // Update item
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required',
            'item_code' => 'required',
            'supplier_name' => 'required',
            'stock_quantity' => 'required|integer',
            'reorder_level' => 'required|integer',
            'purchase_price' => 'required|numeric',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());

        return redirect()->route('inventories.index')->with('success', 'Item updated successfully');
    }

    // Delete item
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventories.index')->with('success', 'Item deleted successfully');
    }
}
