@extends('layouts.app')

@section('content')
<h2>Inventory Stock Report</h2>

@include('reports.navbar')

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Supplier</th>
        <th>Stock</th>
        <th>Price</th>
    </tr>

    @foreach($inventories as $i)
    <tr>
        <td>{{ $i->item_name }}</td>
        <td>{{ $i->supplier_name }}</td>
        <td>{{ $i->stock_quantity }}</td>
        <td>{{ $i->purchase_price }}</td>
    </tr>
    @endforeach
</table>
@endsection
