@extends('backend.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Service</h6>
                @if(Session::has('message'))
                <span class="text-primary">{{Session::get('message')}}</span>
                @endif
                <form action="{{route('store.service')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1">Title <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="title" value="{{old('title')}}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image <span class="text-danger">*</span></label>
                        <input class="form-control bg-dark" type="file" name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" style="height: 150px;" name="description"
                            value="{{old('description')}}">{{old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Items</button>
                </form>
            </div>k
        </div>
    </div>
</div>
@endsection