@extends('layouts.app')

@section('content')
<h2>Edit Inventory Item</h2>

<form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input name="item_name" value="{{ $inventory->item_name }}" class="form-control mb-2">
    <input name="item_code" value="{{ $inventory->item_code }}" class="form-control mb-2">
    <input name="supplier_name" value="{{ $inventory->supplier_name }}" class="form-control mb-2">
    <input type="number" name="stock_quantity" value="{{ $inventory->stock_quantity }}" class="form-control mb-2">
    <input type="number" name="reorder_level" value="{{ $inventory->reorder_level }}" class="form-control mb-2">
    <input type="number" step="0.01" name="purchase_price" value="{{ $inventory->purchase_price }}" class="form-control mb-2">

    <button class="btn btn-primary">Update</button>
</form>
@endsection
