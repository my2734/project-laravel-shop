@extends('layout.app_master_admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách từ khóa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">
                            Từ khóa
                            <caption></caption>
                        </li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{route('admin.keyword.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i> </a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th style="width: 40px">Hot</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($keywords as $key => $keyword)
                                    <tr>
                                        <td>{{($key+1)}}</td>
                                        <td>{{$keyword->k_name}}</td>
                                        <td>
                                           {{ $keyword->k_description}}
                                        </td>
                                        <td>
                                            @if($keyword->k_hot == 1 )
                                                <a href="{{route('admin.keyword.hot', $keyword->id)}}" class="btn btn-sm btn-primary">Hot</a>
                                            @else
                                                <a href="{{route('admin.keyword.hot', $keyword->id)}}" class="btn btn-sm btn-secondary">None</a>
                                            @endif
                                        </td>
                                        <td>{{ $keyword->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.keyword.edit',$keyword->id)}}" class="btn btn-primary">Update</a>
                                            <a href="{{ route('admin.keyword.delete',$keyword->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                </div>                
            </div>
        </div>
    </section>
@endsection