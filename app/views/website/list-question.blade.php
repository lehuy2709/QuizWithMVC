<?php 

use App\Models\Answer;

?>
@extends('layout.main_web')
@section('main-home')

<div class="content">
<h1 id="demo" style="text-align: center;"></h1>   
    <form action="<?= BASE_URL ?>/quiz/xu-ly-quiz/{{$quizs->id}}" method="POST">
        <div class="container mt-sm-5 my-1">
            <?php $i = 1; ?>
             @foreach ($list_quest as $li) 
                <div class="question ml-sm-5 pl-sm-5 pt-2">
                    <div class="py-2 h5"><b><?= $i++ ?>. <?= $li->name ?></b></div>
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <?php
                        $list_ans = Answer::where("question_id", "=", $li->id)->get();
                        ?>
                      @foreach ($list_ans as $ans) 
                            <label class="options">{{$ans->content}} <input type="radio" name="{{$ans->question_id}}" value="{{$ans->id}}"> <span class="checkmark"></span> </label>
                         @endforeach

                    </div>
                </div>
             @endforeach

            <div class="d-flex align-items-center pt-3">
                <div class="ml-auto mr-sm-5"> <button class="btn btn-success" type="submit">Submit</button> </div>
            </div>
        </div>
    </form>
</div>
@endsection

<script>

    var now = new Date()
    var endtime = new Date(now);
    endtime.setMinutes(now.getMinutes() + <?=  $quizs->duration_minutes ?>);
    endtime.setSeconds(now.getSeconds() + 4);
    var countDownDate = endtime.getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

</script>
</div>


