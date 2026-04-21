<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Inventory;
use Carbon\Carbon;

class ReportController extends Controller
{
    // 1. Medicine List Report
    public function medicineReport()
    {
        $medicines = Medicine::all();
        return view('reports.medicine', compact('medicines'));
    }

    // 2. Expiry Medicines Report (expired + next 30 days)
    public function expiryReport()
    {
        $today = now();
        $threshold = now()->addDays(30); // 30-day rule

        $medicines = Medicine::where('expiry_date', '<=', $threshold)->get();

        return view('reports.expiry', compact('medicines'));
    }

    // 3. Low Stock Report
    public function lowStockReport()
    {
        // Medicines (we assume reorder level = 10 for medicines)
        $lowMedicines = Medicine::where('quantity', '<', 10)->get();

        // Inventory (uses reorder_level field)
        $lowInventories = Inventory::whereColumn('stock_quantity', '<', 'reorder_level')->get();

        return view('reports.low_stock', compact('lowMedicines', 'lowInventories'));
    }

    // 4. Inventory Stock Report
    public function inventoryReport()
    {
        $inventories = Inventory::all();
        return view('reports.inventory', compact('inventories'));
    }

    // 5. Search Report
    public function searchReport(Request $request)
    {
        $query = $request->input('search');

        $medicines = Medicine::where('medicine_name', 'LIKE', "%{$query}%")
            ->orWhere('batch_number', 'LIKE', "%{$query}%")
            ->get();

        $inventories = Inventory::where('item_name', 'LIKE', "%{$query}%")
            ->orWhere('item_code', 'LIKE', "%{$query}%")
            ->get();

        return view('reports.search', compact('medicines', 'inventories', 'query'));
    }
}
