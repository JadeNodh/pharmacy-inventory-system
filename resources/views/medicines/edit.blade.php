@extends('layouts.app')

@section('content')
<h2>Edit Medicine</h2>

<form action="{{ route('medicines.update', $medicine->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input name="medicine_name" value="{{ $medicine->medicine_name }}" class="form-control mb-2">
    <input name="category" value="{{ $medicine->category }}" class="form-control mb-2">
    <input name="batch_number" value="{{ $medicine->batch_number }}" class="form-control mb-2">
    <input type="date" name="expiry_date" value="{{ $medicine->expiry_date }}" class="form-control mb-2">
    <input type="number" name="quantity" value="{{ $medicine->quantity }}" class="form-control mb-2">
    <input type="number" step="0.01" name="unit_price" value="{{ $medicine->unit_price }}" class="form-control mb-2">

    <button class="btn btn-primary">Update</button>
</form>
@endsection
