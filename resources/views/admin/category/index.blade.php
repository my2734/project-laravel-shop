@extends('layout.app_master_admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">
                            Danh mục
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
        <div class="container_fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{route('admin.category.create')}}" class="btn btn-primary">Thêm mới  <i class="fa fa-plus"></i> </a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th style="width: 100px">Avatar</th>
                                        <th style="width: 80px">Status</th>
                                        <th style="width: 80px">Hot</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $category)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td>{{ $category->c_name }}</td>
                                        <td>
                                            <div class="" style="width: 100px; height: 100px">
                                                <img  style="width: 100%; height: 100%; object-fit: cover" src="https://images.pexels.com/photos/12406341/pexels-photo-12406341.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load" alt="">
                                            
                                            </div>
                                        </td>
                                        <td>
                                            @if($category->c_status == 1)
                                                <a href="{{ route('admin.category.status', $category->id)}}" class="btn btn-sm btn-primary">Show</a>
                                            @else
                                                <a href="{{ route('admin.category.status', $category->id)}}" class="btn btn-sm btn-secondary">Hide</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($category->c_hot == 0)
                                                <a href="{{route('admin.category.hot',$category->id)}}" class="btn btn-sm btn-secondary">None</a>
                                            @else
                                                <a href="{{route('admin.category.hot',$category->id)}}" class="btn btn-sm btn-primary">Hot</a>
                                            @endif
                                        </td>  
                                        
                                        <td>{{ $category->created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.category.delete',$category->id)}}" class="btn btn-sm btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                            <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Update</a>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    {{ $categories->render('pagination::simple-bootstrap-4') }}
                    
                </div>
            </div>
        </div>
    </section>
@endsection