@extends('layout.main')
@section('main-content')


<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Quản Lý Quiz
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th>Mã Quiz</th>
                            <th>Tên Quiz</th>
                            <th>Môn Học</th>
                            <th>Khoảng Thời Gian</th>
                            <th>Bắt Đầu</th>
                            <th>Kết Thúc</th>
                            <th>Trạng Thái</th>
                            <th>Trộn</th>
                            <th colspan="4">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                              @foreach($quiz as $q) 
                            <tr>
                                <td>{{ $q->id }}</td>
                                <td>{{$q->name}}</td>    
                                <td>{{$q->name_sub}}</td>
                                <td>{{ $q->duration_minutes }} Phút</td>
                                <td>{{ $q->start_time  }} </td>
                                <td>{{ $q->end_time  }}</td>
                                <td>{{$q->status == 0 ? "Được làm" : "Không được làm"}}</td>   
                                <td>{{$q->is_shuffle == 0 ? "Có" : "Không"}}  </td>                            
                                <td>
                                    <a href="{{BASE_URL . '/quiz/cap-nhat/' . $q->id}}" class="btn btn-outline-info">Sửa</a>
                                    <a href="{{BASE_URL . '/quiz/xoa/' . $q->id}}" class="btn btn-outline-secondary">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
   
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <a href="{{BASE_URL. '/quiz/tao-moi'}}" class="btn btn-success">THÊM</a>
                            </td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>



    </div>


    @endsection



