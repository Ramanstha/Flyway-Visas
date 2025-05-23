@extends('backend.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Contact</h6>
                @if(Session::has('message'))
                <span class="text-primary">{{Session::get('message')}}</span>
                @endif
                <form action="{{route('update.contact',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" value="{{$data->email   }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Phone <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="phone" value="{{$data->phone}}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Address <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="address" value="{{$data->address}}">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Map <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="map" value="{{$data->map}}">
                        @error('map')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update contact</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection