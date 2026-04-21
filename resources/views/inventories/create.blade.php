@extends('layouts.app')

@section('content')
<h2>Add Inventory Item</h2>

<form action="{{ route('inventories.store') }}" method="POST">
    @csrf

    <input name="item_name" class="form-control mb-2" placeholder="Item Name">
    <input name="item_code" class="form-control mb-2" placeholder="Item Code">
    <input name="supplier_name" class="form-control mb-2" placeholder="Supplier Name">
    <input type="number" name="stock_quantity" class="form-control mb-2" placeholder="Stock Quantity">
    <input type="number" name="reorder_level" class="form-control mb-2" placeholder="Reorder Level">
    <input type="number" step="0.01" name="purchase_price" class="form-control mb-2" placeholder="Purchase Price">

    <button class="btn btn-success">Save</button>
</form>
@endsection
