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
            <div class="card-header">Thêm mới môn học
            </div>
            <form action="<?= BASE_URL . '/mon-hoc/luu-tao-moi' ?>" method="POST">
                <div class="form-group">
                    <label for="input-1">Mã Môn Học</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Auto number" name="id" readonly>
                </div>
                <div class="form-group">
                    <label for="input-2">Tên Môn Học</label>
                    <input type="text" class="form-control" id="input-2" placeholder="" name="name">
                </div>
                <div class="form-group">
                    <button type="submit" name="btn_insert" class="btn btn-success">Thêm</button>
                    <a href="{{BASE_URL.'/mon-hoc/list'}}" class="btn btn-light">Quay Lại</a>
                </div>
            </form>
        </div>



    </div>

    @endsection