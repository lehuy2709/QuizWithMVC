<?php

namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;

class QuizController
{
    public function index()
    {
        $quiz = Quiz::join("subjects", "quizs.subject_id", "=", "subjects.id")->select("quizs.*", "subjects.name as name_sub")->get();
        return view('quiz.index', [
            'quiz' => $quiz
        ]);
    }
    public function addForm()
    {
        $subjects = Subject::all();
        return view('quiz.add-form', [
            'subjects' => $subjects
        ]);
    }
    public function saveAdd()
    {
        if (
            $_POST["name"] == "" ||
            $_POST["subject_id"] == "" ||
            $_POST["duration_time"] == "" ||
            $_POST["startTime"] == "" ||
            $_POST["endTime"] == "" ||
            $_POST["status"] == "" ||
            $_POST["is_shuffle"] == ""
        ) {
            $_SESSION["error"] = "Các trường không được để trống";
            header('location: ' . BASE_URL . '/quiz/tao-moi');
            die;
        }
        Quiz::create([
            "name" => $_POST["name"],
            "subject_id" => $_POST["subject_id"],
            "duration_minutes" => $_POST["duration_time"],
            "start_time" => $_POST["startTime"],
            "end_time" => $_POST["endTime"],
            "status" => $_POST["status"],
            "is_shuffle" => $_POST["is_shuffle"]
        ]);

        header('location: ' . BASE_URL . '/quiz');
        die;
    }
    public function editForm($id)
    {


        $quiz = Quiz::join("subjects", "quizs.subject_id", "=", "subjects.id")->select("quizs.*", "subjects.name as name_sub", "subjects.id as sub_id")->where("quizs.id", $id)->first();
        $subjects = Subject::all();
        return view('quiz.edit-form', [
            'subjects' => $subjects,
            'quiz' => $quiz
        ]);
    }
    public function saveEdit($id)
    {
       
        $quiz  = Quiz::where('id','=',$id)->first();
        if (
            $_POST["name"] == "" ||
            $_POST["subject_id"] == "" ||
            $_POST["duration_time"] == "" ||
            $_POST["status"] == "" ||
            $_POST["is_shuffle"] == ""
        ) {
            $_SESSION["error"] = "Các trường không được để trống";
            header('location: ' . BASE_URL . '/quiz/cap-nhat/' . $id);
            die;
        }
        $quiz->name = $_POST["name"];
        $quiz->subject_id = $_POST["subject_id"];
        $quiz->duration_minutes = $_POST["duration_time"];
        $quiz->start_time = $_POST["startTime"];
        $quiz->end_time = $_POST["endTime"];
        $quiz->status = $_POST["status"];
        $quiz->is_shuffle = $_POST["is_shuffle"];
        $quiz->save();
        header('location: ' . BASE_URL . '/quiz');
        die;
    }
    public function remove($id)
    {
        $x = Quiz::find($id)->delete();
        header('location: ' . BASE_URL . '/quiz');
        die;
    }
}
