@extends('layouts.app')

@section('content')
<h2>Inventory</h2>

<a href="{{ route('inventories.create') }}" class="btn btn-primary mb-3">Add Item</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Supplier</th>
            <th>Stock</th>
            <th>Reorder</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inventories as $item)
        <tr>
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->item_code }}</td>
            <td>{{ $item->supplier_name }}</td>
            <td>{{ $item->stock_quantity }}</td>
            <td>{{ $item->reorder_level }}</td>
            <td>{{ $item->purchase_price }}</td>
            <td>
                <a href="{{ route('inventories.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('inventories.destroy', $item->id) }}" method="POST" style="display:inline;">
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
