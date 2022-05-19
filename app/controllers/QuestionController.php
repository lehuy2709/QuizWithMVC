<?php

namespace App\Controllers;

use App\Models\Question;
use App\Models\Quiz;

class QuestionController
{
    public function index()
    {
        $question = Question::join("quizs", "questions.quiz_id", "=", "quizs.id")->select("questions.*", "quizs.name as name_quiz")->get();
        return view('question.index', [
            'question' => $question
        ]);
    }
    public function addForm()
    {
        $quizs = Quiz::all();
        return view('question.add-form', [
            'quizs' => $quizs
        ]);
    }
    public function saveAdd()
    {
        $target_dir = "../asm1/img/";
        $fileUpload = $_FILES['img'];
        $fileName = $fileUpload["name"];
        $path = $target_dir . $fileName;
        move_uploaded_file($fileUpload['tmp_name'], $path);
        if ($_POST["name"] == "" || $_POST["name"] == 0) {
            $_SESSION["error"] = "Câu hỏi không được để trống";
            header("Location:" . BASE_URL . "/question/tao-moi");
            die;
        }
        if (strpos($fileUpload['type'], "image") === false) {
            $_SESSION['error'] = "Phải là ảnh";
            header("Location:" . BASE_URL . "/question/tao-moi");
            die;
        }
        if ($fileUpload['size'] > 3000000) {
            $_SESSION['error'] = "ảnh phải nhỏ hơn 3m";
            header("Location:" . BASE_URL . "/question/tao-moi");
            die;
        }
        Question::create([
            "name" => $_POST["name"],
            "quiz_id" => $_POST["quiz_id"],
            "img" => $fileName
        ]);
        header("Location:" . BASE_URL . "/question");
        die;
    }
    public function remove($id)
    {
        $x = Question::find($id)->delete();
        header('location: ' . BASE_URL . '/question');
        die;
    }
    public function editForm($id)
    {
        $quizs = Quiz::all();
        $question = Question::join("quizs", "questions.quiz_id", "=", "quizs.id")->select("questions.*", "quizs.name as name_quizs", "quizs.id as q_id")->where('questions.id', '=', $id)->first();
        return view('question.edit-form', [
            'quizs' => $quizs,
            'question' => $question
        ]);
    }
    public  function saveEdit($id)
    {
        $question  = Question::where('id', '=', $id)->first();
        $target_dir = "../asm1/img/";
        $fileUpload = $_FILES['img'];
        if ($fileUpload["size"] > 0) {
            $fileName = $fileUpload["name"];
            $path = $target_dir . $fileName;
        } else {
            $fileName = $question->img;
            $path = $target_dir . $fileName;
        }
        move_uploaded_file($fileUpload['tmp_name'], $path);
        $data =  [
            "name" => $_POST["name"],
            "quiz_id" => $_POST["quiz_id"],
            "img" => $fileName
        ];
        $question->name = $_POST["name"];
        $question->quiz_id = $_POST["quiz_id"];
        $question->img = $fileName;
        $question->save();
        header('location: ' . BASE_URL . "/question");
        die;
    }
}
