@extends('backend.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-4">
            <a href="{{route('create.service')}}" class="btn btn-primary mb-2">
                <i class="fa fa-plus-circle me-2"></i> Services</a>
        </div>
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Services Table</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th class="ac px-4" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($file as $key=>$site)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td class="text-capitalize">{{$site->title}}</td>
                                <td>
                                    <img src="{{asset('storage/service/'.$site->image)}}" height="100" width="100">
                                </td>
                                <td>{!!Str::limit($site->description,25)!!}</td>
                                <td>
                                    <input data-id="{{$site->id}}" class="service" type="checkbox"
                                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                        data-on="Active" data-off="InActive" {{ $site->status ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <a href="{{route('edit.service',$site->id)}}"><i class="fa fa-edit text-light px-4"
                                            title="Edit"></i></a>
                                    <a href="{{route('delete.service',$site->id)}}"><i class="fa fa-trash"
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