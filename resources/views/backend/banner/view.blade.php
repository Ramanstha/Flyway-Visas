@extends('backend.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-4">
            <a href="{{route('create.banner')}}" class="btn btn-primary mb-2">
                <i class="fa fa-plus-circle me-2"></i> Banner</a>
        </div>
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Banner Table</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Subtitle</th>
                                <th class="ac px-4" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($file as $key=>$site)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td class="text-capitalize">{{$site->title}}</td>
                                <td>
                                    <img src="{{asset('storage/banner/'.$site->image)}}" height="100" width="100">
                                </td>
                                <td>{{$site->subtitle}}</td>
                                <td>
                                    <a href="{{route('edit.banner',$site->id)}}"><i class="fa fa-edit text-light px-4"
                                            title="Edit"></i></a>
                                    <a href="{{route('delete.banner',$site->id)}}"><i class="fa fa-trash"
                                            onclick="return confirm('Are you sure you want to delete?')"
                                            title="Delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection