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
            <div class="card-header">Thêm mới Đáp án
            </div>
            <form action="{{BASE_URL . '/answer/luu-tao-moi'}}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="input-1">Mã Answer</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Auto number" name="id" readonly>
                </div>
                <div class="form-group">
                    <label for="input-2">Nội dung</label>
                    <input type="text" class="form-control" id="input-2" placeholder="" name="content">
                </div>
                <div class="form-group">
                    <label for="input-2">Câu hỏi</label>
                    <select name="question_id" id="" class="form-control">
                         @foreach($question as $q )
                        <option value="{{$q->id}}">{{$q->name}}</option>
                         @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-2">Đúng || Sai</label>
                    <select name="is_correct" id="" class="form-control">
                        <option value="0">Sai</option>
                        <option value="1">Đúng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-2">Ảnh</label>
                    <input type="file" class="form-control" id="input-2"name="img">
                </div>
                <div class="form-group">
                    <button type="submit" name="btn_insert" class="btn btn-success">Thêm</button>
                    <a href="{{BASE_URL. '/answer/list'}}" class="btn btn-light">Quay Lại</a>
                </div>
            </form>
        </div>



    </div>
</div>


@endsection
