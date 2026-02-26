<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Product List</h4>
                        <a href="{{ route('products.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-circle"></i> Add New Product
                        </a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td><strong>{{ $product->name }}</strong></td>
                                            <td>
                                                <span class="badge bg-info">{{ $product->category }}</span>
                                            </td>
                                            <td class="text-success">Rs. {{ number_format($product->price, 2) }}</td>
                                            <td>
                                                @if($product->quantity > 10)
                                                    <span class="badge bg-success">{{ $product->quantity }}</span>
                                                @elseif($product->quantity > 0)
                                                    <span class="badge bg-warning">{{ $product->quantity }}</span>
                                                @else
                                                    <span class="badge bg-danger">Out of Stock</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if($products->isEmpty())
                            <div class="text-center py-5">
                                <p class="text-muted">No products found. Add your first product!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
