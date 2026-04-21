@extends('layouts.app')

@section('content')
<h2>Add Medicine</h2>

<form action="{{ route('medicines.store') }}" method="POST">
    @csrf

    <input name="medicine_name" class="form-control mb-2" placeholder="Medicine Name">
    <input name="category" class="form-control mb-2" placeholder="Category">
    <input name="batch_number" class="form-control mb-2" placeholder="Batch Number">
    <input type="date" name="expiry_date" class="form-control mb-2">
    <input type="number" name="quantity" class="form-control mb-2" placeholder="Quantity">
    <input type="number" step="0.01" name="unit_price" class="form-control mb-2" placeholder="Unit Price">

    <button class="btn btn-success">Save</button>
</form>
@endsection
