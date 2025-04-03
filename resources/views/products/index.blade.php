@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush

@section('title')
    Products
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Products</li>
    <li>
        <a href="{{ route('products.create') }}" class="btn btn-primary ">Add New Product</a>
    </li>
@endsection

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Product List</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Skin Type</th>
                <th>Product Type</th>
                <th>Short Description</th>
                <th>More Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->ProductID }}</td>
                <td>{{ $product->ProductName }}</td>
                <td>{{ $product->SkinType }}</td>
                <td>{{ $product->ProductType }}</td>
                <td>{{ $product->ShortDesrciption }}</td>
                <td>{{ $product->MoreDescription }}</td>
                <td>
                    <div style="display: flex; flex-direction: row; gap: 5px;">
                        <a href="{{ route('products.edit', $product->ProductID) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->ProductID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>       
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(function () {
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
    })
</script>
@endpush