@extends('layout.main_web')
@section('main-home')
    

<div class="content">
    <div class="title-center">
        <h1 style="text-align:center;">Đề Tài Quiz</h1>
    </div>
    <div class="item-gr">
        @foreach($subject as $s)
        <div class="card">
            <div class="card-header">
                {{$s->name }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="quiz/danh-sach/{{$s->id}}"class="btn btn-primary">Làm Ngay</a>
            </div>
        </div>
       @endforeach

        

        

    </div>
</div>
@endsection

