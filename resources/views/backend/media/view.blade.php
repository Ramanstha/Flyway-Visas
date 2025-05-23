@extends('backend.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-4">
            <a href="{{route('create.medialink')}}" class="btn btn-primary mb-2">
                <i class="fa fa-plus-circle me-2"></i> Media</a>
        </div>
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Media Table</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Facebook</th>
                                <th scope="col">Instagram</th>
                                <th scope="col">LinkedIn</th>
                                <th scope="col">Whatsapp</th>
                                <th class="ac px-4" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($file as $key=>$site)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{!!Str::limit($site->facebook,20)!!}</td>
                                <td>{!!Str::limit($site->instagram,20)!!}</td>
                                <td>{!!Str::limit($site->linkedin,20)!!}</td>
                                <td>{!!Str::limit($site->whatsapp,20)!!}</td>
                                <td>
                                    <a href="{{route('edit.medialink',$site->id)}}"><i class="fa fa-edit text-light px-4"
                                            title="Edit"></i></a>
                                    <a href="{{route('delete.medialink',$site->id)}}"><i class="fa fa-trash"
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