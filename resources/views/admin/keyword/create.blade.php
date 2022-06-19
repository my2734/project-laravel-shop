@extends('layout.app_master_admin')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm từ khóa mới</h1>
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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <form action="{{route('admin.keyword.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                
                                <label for="">Từ khóa <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" placeholder="Nhập từ khóa ..." name="k_name" >
                                @error('k_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea type="text" class="form-control" placeholder="Nhập mô tả từ khóa ..." rows="5" name="k_description" ></textarea>
                                
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{route('admin.keyword.index')}}" class="btn btn-danger"> <i class="fa fa-undo"></i> Quay về</a>
                            <button class="btn btn-success"> <i class="fa fa-save"></i> Lưu dữ liệu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection