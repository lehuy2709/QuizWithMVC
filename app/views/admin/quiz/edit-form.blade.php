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
            <div class="card-header">Sửa quiz
            </div>
            <form action="{{BASE_URL . '/quiz/luu-cap-nhat/'.$quiz->id}} " method="POST">
                <div class="form-group">
                    <label for="input-1">Mã Quiz</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Auto number" name="id" value="{{$quiz->id}}" readonly disabled>
                </div>
                <div class="form-group">
                    <label for="input-2">Tên Quiz</label>
                    <input type="text" class="form-control" id="input-2" placeholder="" name="name" value="{{$quiz->name }}">
                </div>
                <div class="form-group">
                    <label for="input-2">Môn Học</label>
                    <select name="subject_id" id="" class="form-control">
                        <option selected hidden value="{{ $quiz->sub_id}}">{{$quiz->name_sub}} </option>
                         @foreach($subjects as $sub ) 
                        <option value="{{$sub->id }}">{{$sub->name}} </option>
                         @endforeach 

                    </select>
                </div>
                <div class="form-group">
                    <label for="input-2">Thời Gian Làm Bài</label>
                    <input type="number" class="form-control" id="input-2" placeholder="Tính bằng phút" name="duration_time" value="{{$quiz->duration_minutes}}">
                </div>
                <div class="form-group">
                    <label for="input-2">Thời Gian Bắt Đầu</label>
                    <input type="datetime-local" class="form-control" id="input-2" name="startTime" value="{{$quiz->start_time}}">
                </div>
                <div class="form-group">
                    <label for="input-2">Thời Gian Kết Thúc</label>
                    <input type="datetime-local" class="form-control" id="input-2" name="endTime" value="{{$quiz->end_time}}">
                </div>
                <div class="form-group">
                    <label for="input-2">Trạng Thái</label>
                    <select name="status" id="" class="form-control">
                    <option selected hidden value="{{$quiz->status}}"> {{($quiz->status == 0 ) ? "Được làm " : "Không được làm"}} </option>
                        <option value="0">Được Làm</option>
                        <option value="1">Không được làm</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-2">Trộn Quiz</label>
                    <select name="is_shuffle" id="" class="form-control">
                    <option selected hidden value="{{$quiz->is_shuffle}}">{{($quiz->is_shuffle == 0 ) ? "Có " : "Không"}}</option>
                        <option value="0">Có</option>
                        <option value="1">Không</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="btn_insert" class="btn btn-success">Lưu lại</button>
                    <a href="{{BASE_URL. '/quiz/list'}}" class="btn btn-light">Quay Lại</a>
                </div>
            </form>
        </div>



    </div>


    @endsection