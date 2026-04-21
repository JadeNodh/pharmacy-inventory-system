<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return redirect()->route('medicines.index');
});

Route::resource('medicines', MedicineController::class);
Route::resource('inventories', InventoryController::class);

Route::get('/reports/medicines', [ReportController::class, 'medicineReport'])->name('reports.medicines');
Route::get('/reports/expiry', [ReportController::class, 'expiryReport'])->name('reports.expiry');
Route::get('/reports/low-stock', [ReportController::class, 'lowStockReport'])->name('reports.lowstock');
Route::get('/reports/inventory', [ReportController::class, 'inventoryReport'])->name('reports.inventory');
Route::get('/reports/search', [ReportController::class, 'searchReport'])->name('reports.search');
