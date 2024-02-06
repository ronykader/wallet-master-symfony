@extends('layout')
@section('content')
    <h2>Category List</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">SL</th>
            <th scope="col">Category Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($categories))
            @foreach($categories as $key => $category)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->status === 1 ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="" class="btn btn-dark">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
