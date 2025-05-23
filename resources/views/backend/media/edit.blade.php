@extends('backend.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit media</h6>
                @if(Session::has('message'))
                <span class="text-primary">{{Session::get('message')}}</span>
                @endif
                <form action="{{route('update.medialink',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1">Facebook</label>
                        <input class="form-control" type="text" name="facebook" value="{{$data->facebook}}">
                        @error('facebook')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Instagram</label>
                        <input class="form-control" type="text" name="instagram" value="{{$data->instagram}}">
                        @error('instagram')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Linkedin </label>
                        <input type="text" class="form-control" name="linkedin" value="{{$data->linkedin}}">
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">Whatsapp </label>
                        <input type="number" class="form-control" name="whatsapp" value="{{$data->whatsapp}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Media</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection