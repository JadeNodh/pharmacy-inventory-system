@extends('layouts.app')

@section('content')
<h2>Medicine List Report</h2>

@include('reports.navbar')

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Batch</th>
        <th>Expiry</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>

    @foreach($medicines as $m)
    <tr>
        <td>{{ $m->medicine_name }}</td>
        <td>{{ $m->batch_number }}</td>
        <td>{{ $m->expiry_date }}</td>
        <td>{{ $m->quantity }}</td>
        <td>{{ $m->unit_price }}</td>
    </tr>
    @endforeach
</table>
@endsection
