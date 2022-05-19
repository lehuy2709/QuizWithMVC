@extends('layout.main_web')
@section('main-home')
<div class="content">
    <div class="title-center">
        <h1 style="text-align:center;">{{$subject->name}} </h1>
    </div>
    <div class="item-gr">
     @foreach($quizs as $qu)
        <div class="card">
            <div class="card-header"> 
            <?php if(isset($qu->name)) {echo $qu->name;} ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">Bắt đầu : {{$qu->start_time}}</h5>
                <p class="card-text">Kết thúc : {{$qu->end_time}}</p>
                <p class="card-text">Thời gian làm: {{$qu->duration_minutes}} Phút</p>
                <a href="{{BASE_URL}}/quiz/lam-bai/{{$qu->id}}"class="btn btn-primary">Làm Ngay</a>
            </div> 
        </div>
         @endforeach
    </div>
</div>

@endsection