@extends('backend.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Gallery</h6>
                @if(Session::has('message'))
                <span class="text-primary">{{Session::get('message')}}</span>
                @endif
                <form action="{{route('update.gallery',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="example-file" class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control bg-dark" name="image[]" multiple>
                        <img src="{{asset('storage/gallery/'.$data->image)}}" height="100" width="100">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image <span class="text-danger">*</span></label>
                        <input class="form-control bg-dark" type="file" name="image">
                        <img src="{{asset('storage/gallery/'.$data->image)}}" height="100" width="100">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update gallery</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection