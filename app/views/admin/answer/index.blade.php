@extends('layout.main')
@section('main-content')

<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Quản Lý Đáp Án
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Nội Dung</th>
                            <th>Câu Hỏi</th>
                            <th>Đúng || Sai</th>
                            <th>Ảnh</th>
                            <th colspan="4">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                             @foreach($answer as $ans) 
                            <tr>
                                <td>{{$ans->id}}</td>
                                <td>{{$ans->content}}</td>
                                <td>{{$ans->name_questions}}</td>
                                <td>{{$ans->is_correct == 0 ? "Sai" : "Đúng"}}</td>   
                                <td><img src="{{ADMIN_IMG . "/$ans->img"}}" alt="" width="50px"></td>                                     
                                <td>
                                    <a href="{{BASE_URL . '/answer/cap-nhat/'.$ans->id}}" class="btn btn-outline-info">Sửa</a>
                                    <a href="{{BASE_URL . '/answer/xoa/'.$ans->id}}" class="btn btn-outline-secondary">Xóa</a>
                                </td>
                            </tr>
                             @endforeach
                 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <a href="{{BASE_URL. '/answer/tao-moi'}}" class="btn btn-success">THÊM</a>
                            </td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>



    </div>

    @endsection



