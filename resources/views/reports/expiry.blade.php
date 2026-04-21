@extends('layouts.app')

@section('content')
<h2>Expiry Medicines Report</h2>

@include('reports.navbar')

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Batch</th>
        <th>Expiry Date</th>
        <th>Status</th>
    </tr>

    @foreach($medicines as $m)
    <tr @if($m->expiry_date < now()) class="table-danger" @endif>
        <td>{{ $m->medicine_name }}</td>
        <td>{{ $m->batch_number }}</td>
        <td>{{ $m->expiry_date }}</td>
        <td>
            @if($m->expiry_date < now())
                <span class="text-danger">Expired</span>
            @elseif($m->expiry_date <= now()->addDays(30))
                <span class="text-warning">Expiring Soon</span>
            @else
                <span class="text-success">Valid</span>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
