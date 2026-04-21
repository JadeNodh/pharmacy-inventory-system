@extends('layouts.app')

@section('content')
<h2>Search Report</h2>

@include('reports.navbar')

<form method="GET" action="{{ route('reports.search') }}">
    <input type="text" name="search" class="form-control mb-2" placeholder="Search by name or code">
    <button class="btn btn-primary mb-3">Search</button>
</form>

@if(isset($query))

<h4>Results for "{{ $query }}"</h4>

<!-- Medicines -->
<h5>Medicines</h5>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Batch</th>
        <th>Expiry</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>

    @forelse($medicines as $m)
    <tr>
        <td>{{ $m->medicine_name }}</td>
        <td>{{ $m->batch_number }}</td>
        <td>{{ $m->expiry_date }}</td>
        <td>{{ $m->quantity }}</td>
        <td>{{ $m->unit_price }}</td>
    </tr>
    @empty
    <tr><td colspan="5">No medicines found</td></tr>
    @endforelse
</table>

<!-- Inventory -->
<h5>Inventory</h5>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Code</th>
        <th>Supplier</th>
        <th>Stock</th>
        <th>Price</th>
    </tr>

    @forelse($inventories as $i)
    <tr>
        <td>{{ $i->item_name }}</td>
        <td>{{ $i->item_code }}</td>
        <td>{{ $i->supplier_name }}</td>
        <td>{{ $i->stock_quantity }}</td>
        <td>{{ $i->purchase_price }}</td>
    </tr>
    @empty
    <tr><td colspan="5">No inventory items found</td></tr>
    @endforelse
</table>

@endif

@endsection
