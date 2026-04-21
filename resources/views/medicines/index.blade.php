@extends('layouts.app')

@section('content')
<h2>Medicines</h2>

<a href="{{ route('medicines.create') }}" class="btn btn-primary mb-3">Add Medicine</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Batch</th>
            <th>Expiry</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicines as $medicine)
        <tr>
            <td>{{ $medicine->medicine_name }}</td>
            <td>{{ $medicine->category }}</td>
            <td>{{ $medicine->batch_number }}</td>
            <td>{{ $medicine->expiry_date }}</td>
            <td>{{ $medicine->quantity }}</td>
            <td>{{ $medicine->unit_price }}</td>
            <td>
                <a href="{{ route('medicines.edit', $medicine->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
