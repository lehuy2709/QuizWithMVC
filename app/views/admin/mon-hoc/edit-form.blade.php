@extends('layout.main')
@section('main-content')


<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
        <?php if (isset($_SESSION['error'])) { ?>
                <div class="warning alert-danger" style="padding:10px; margin-bottom:10px;">
                <strong>Lỗi !</strong> <?= $_SESSION['error'] ?>
                </div>
                <?php unset($_SESSION['error']) ?>
           <?php } ?>
            <div class="card-header">Sửa môn học
            </div>
            <form action="{{BASE_URL . '/mon-hoc/luu-cap-nhat/'. $model->id}}" method="POST">
                <div class="form-group">
                    <label for="input-1">Mã Môn Học</label>
                    <input type="text" class="form-control" id="input-1" value="{{$model->id}}" name="id" readonly disabled>
                </div>
                <div class="form-group">
                    <label for="input-2">Tên Môn Học</label>
                    <input type="text" class="form-control" id="input-2" placeholder="" name="name" value="{{$model->name}}">
                </div>
                <div class="form-group">
                    <button type="submit" name="btn_save" class="btn btn-success">Lưu lại</button>
                    <a href="{{BASE_URL.'/mon-hoc/list'}}" class="btn btn-light">Quay Lại</a>
                </div>
            </form>
        </div>



    </div>



    </div>


    @endsection