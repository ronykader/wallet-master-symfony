@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-4 mt-5 mb-5">

            <form method="POST" action="{{ route('item.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select a Category</option>
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="item_name" class="form-label">Item Name</label>
                    <input type="text" name="item_name" class="form-control" id="item_name"
                           aria-describedby="emailHelp">
                    @error('item_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create Item</button>
            </form>

        </div>
    </div>
@endsection
