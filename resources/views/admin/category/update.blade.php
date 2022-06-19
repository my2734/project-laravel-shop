@extends('layout.app_master_admin')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm danh mục mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item ">
                        Danh mục
                        <caption></caption>
                    </li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container_fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                   
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('admin.category.update',$category->id)}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục <span class="text-danger">(*)</span></label>
                                <input type="type" class="form-control" value="{{$category->c_name}}" id="exampleInputEmail1" name="c_name" placeholder="Nhập tên danh mục ...">
                                @error('c_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                           
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{route('admin.category.index')}}" class="btn btn-danger"> <i class="fa fa-undo"></i> Quay về</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Lưu dữ liệu</button>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
</section>
@endsection