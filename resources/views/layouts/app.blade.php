<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Pharmacy System</a>

        <div>
            <a href="{{ route('medicines.index') }}" class="btn btn-outline-light me-2">Medicines</a>
            <a href="{{ route('inventories.index') }}" class="btn btn-outline-light">Inventory</a>
            <a href="{{ route('reports.medicines') }}" class="btn btn-outline-light">Reports</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
