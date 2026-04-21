@extends('layouts.app')

@section('content')
<h2>Low Stock Report</h2>

@include('reports.navbar')

<h4>Medicines</h4>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Quantity</th>
    </tr>

    @foreach($lowMedicines as $m)
    <tr class="table-warning">
        <td>{{ $m->medicine_name }}</td>
        <td>{{ $m->quantity }}</td>
    </tr>
    @endforeach
</table>

<h4>Inventory</h4>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Stock</th>
        <th>Reorder Level</th>
    </tr>

    @foreach($lowInventories as $i)
    <tr class="table-warning">
        <td>{{ $i->item_name }}</td>
        <td>{{ $i->stock_quantity }}</td>
        <td>{{ $i->reorder_level }}</td>
    </tr>
    @endforeach
</table>
@endsection
