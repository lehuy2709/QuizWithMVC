@extends('layout.main')
@section('main-content')


<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Quản Lý Môn Học
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th>Mã môn</th>
                            <th>Tên môn</th>
                            <th colspan="4">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($subjects as $sub)
                            <tr>
                                <td>{{$sub->id}}</td>
                                <td> {{$sub->name}}  </td>                         
                                <td>
                                    <a href="{{BASE_URL . '/mon-hoc/cap-nhat/' . $sub->id }}" class="btn btn-outline-info">Sửa</a>
                                    <a href="{{BASE_URL . '/mon-hoc/xoa/' . $sub->id }}" class="btn btn-outline-secondary">Xóa</a>
                                </td>
                            </tr>
             
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <a href="{{BASE_URL. '/mon-hoc/tao-moi'}}" class="btn btn-success">THÊM</a>
                            </td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>



    </div>
</div>


@endsection



