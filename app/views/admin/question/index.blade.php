@extends('layout.main')
@section('main-content')

<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Quản Lý Câu Hỏi
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Câu Hỏi</th>
                            <th>Tên Quiz</th>
                            <th>Ảnh</th>
                            <th colspan="4">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                             @foreach($question as $qe) 
                            <tr>
                                <td>{{$qe->id}} </td>
                                <td>{{$qe->name}}</td>
                                <td>{{$qe->name_quiz}}</td>
                                <td><img src="{{ADMIN_IMG . "/$qe->img"}}" alt="" width="50px"></td>                                     
                                <td>
                                    <a href="{{BASE_URL . '/question/cap-nhat/'.$qe->id}}" class="btn btn-outline-info">Sửa</a>
                                    <a href="{{BASE_URL . '/question/xoa/'.$qe->id}}" class="btn btn-outline-secondary">Xóa</a>
                                </td>
                            </tr>
                             @endforeach
                 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <a href="{{BASE_URL. '/question/tao-moi'}}" class="btn btn-success">THÊM</a>
                            </td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>



    </div>


    @endsection



