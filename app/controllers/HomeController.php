<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Quiz;
use App\Models\StudentQuiz;

class HomeController
{
    public function index()
    {

        $subject = Subject::all();
        return view_home('index',[
            'subject' =>$subject
        ]);
    }
    public function listQuiz($id)
    {
        if (!isset($_SESSION["student_id"])) {
            header("Location:" . BASE_URL . "/dang-nhap");
            die;
        }
        $subject  = Subject::where('id', '=', $id)->first();
        $quiz = Quiz::join("subjects", "quizs.subject_id", "=", "subjects.id")->select("quizs.*", "subjects.name as name_sub")->where("subjects.id", $id)->get();
        return view_home('list-quiz',[
            'subject' =>$subject,
            'quizs' => $quiz
        ]);
    }
    public function listQuestion($id)
    {
        $quizs = Quiz::where("id","=",$id)->first();
        $list_quest = Question::where("quiz_id", "=", $id)->get();;
        return view_home('list-question',[
            'quizs' =>$quizs,
            'list_quest' => $list_quest
        ]);
    }
    public function xulyQuiz($id)
    {
        $point = 0;
        foreach ($_POST as $key => $value) {
            $model = Answer::where("id", "=", $value)->first();
            if ($model->is_correct==1) {
                $point++;
            }
        }
        StudentQuiz::create([
            "student_id" => $_SESSION["student_id"],
            "quiz_id" => $id,
            "score" => $point
        ]);
    }
}
