@extends('backend.master')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Create Subcategory</h6>
                @if(Session::has('message'))
                <span class="text-primary">{{Session::get('message')}}</span>
                @endif
                <form action="{{route('store.subcategory')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category<span class="text-danger">*</span></label>
                        <select name="category_id" class="form-control" id="category">
                            <option value="">----------------Select Category----------------</option>
                            @foreach ($category as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Title <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="title" value="{{old('title')}}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Subcategory</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection