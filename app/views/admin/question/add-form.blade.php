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
            <div class="card-header">Thêm mới câu hỏi
            </div>
            <form action="{{BASE_URL . '/question/luu-tao-moi'}} " method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="input-1">Mã Question</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Auto number" name="id" readonly>
                </div>
                <div class="form-group">
                    <label for="input-2">Câu Hỏi</label>
                    <input type="text" class="form-control" id="input-2" placeholder="" name="name">
                </div>
                <div class="form-group">
                    <label for="input-2">Tên Quiz</label>
                    <select name="quiz_id" id="" class="form-control">
                        @foreach($quizs as $q )
                        <option value="{{$q->id}}">{{$q->name}}</option>
                         @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-2">Ảnh</label>
                    <input type="file" class="form-control" id="input-2"name="img">
                </div>
                <div class="form-group">
                    <button type="submit" name="btn_insert" class="btn btn-success">Thêm</button>
                    <a href="{{BASE_URL. '/question/list'}}" class="btn btn-light">Quay Lại</a>
                </div>
            </form>
        </div>



    </div>


    @endsection