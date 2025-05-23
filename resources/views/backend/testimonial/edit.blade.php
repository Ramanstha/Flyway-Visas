@extends('backend.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Testimonial</h6>
                @if(Session::has('message'))
                <span class="text-primary">{{Session::get('message')}}</span>
                @endif
                <form action="{{route('update.testimonial',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1">Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$data->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Position <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="position" value="{{$data->position}}">
                        @error('position')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image <span class="text-danger">*</span></label>
                        <input class="form-control bg-dark" type="file" name="image">
                        <img src="{{asset('storage/testimonial/'.$data->image)}}" height="100" width="100">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" style="height: 150px;" name="description"
                            value="{{$data->description}}">{{$data->description}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection