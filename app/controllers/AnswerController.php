<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;

class AnswerController
{
    public function index()
    {
        $answer = Answer::join("questions", "answers.question_id", "=", "questions.id")->select("answers.*", "questions.name as name_questions")->get();
        return view('answer.index', [
            'answer' => $answer
        ]);
    }
    public function addForm(){
        $question = Question::all();
        return view('answer.add-form', [
            'question' => $question
        ]);
    }
    public function saveAdd(){
        $target_dir = "../asm1/img/";
        $fileUpload = $_FILES['img'];
        $fileName = $fileUpload["name"];
        $path = $target_dir . $fileName;
        move_uploaded_file($fileUpload['tmp_name'], $path);
        if ($_POST["content"] == "") {
            $_SESSION["error"] = "Nội dung không được để trống";
            header("Location:" . BASE_URL . "/answer/tao-moi");
            die;
        }
        if (strpos($fileUpload['type'], "image") === false) {
            $_SESSION['error'] = "Phải là ảnh";
            header("Location:" . BASE_URL . "/answer/tao-moi");
            die;
        }
        if ($fileUpload['size'] > 3000000) {
            $_SESSION['error'] = "ảnh phải nhỏ hơn 3m";
            header("Location:" . BASE_URL . "/answer/tao-moi");
            die;
        }
        Answer::create([
            "content" => $_POST["content"],
            "question_id" => $_POST["question_id"],
            "is_correct" =>$_POST["is_correct"],
            "img" => $fileName
        ]);
        header("Location:" . BASE_URL . "/answer");
        die;
    }
    public function remove($id){
        $x = Answer::find($id)->delete();
        header('location: ' . BASE_URL . '/answer');
        die;
    }
    public function editForm($id){
        $question = Question::all();
        $answer = Answer::join("questions", "answers.question_id", "=", "questions.id")->select("answers.*", "questions.name as name_questions","questions.id as qe_id")->where('answers.id', '=', $id)->first();
        return view('answer.edit-form', [
            'question' => $question,
            'answer' => $answer
        ]);
      
        include_once "./app/views/admin/answer/edit-form.php";
    }
    public function saveEdit($id){
        $answer  = Answer::where('id', '=', $id)->first();
        $target_dir = "../asm1/img/";
        $fileUpload = $_FILES['img'];
        if ($fileUpload["size"] > 0) {
            $fileName = $fileUpload["name"];
            $path = $target_dir . $fileName;
        } else {
            $fileName = $answer->img;
            $path = $target_dir . $fileName;
        }
        move_uploaded_file($fileUpload['tmp_name'], $path);
        $answer->content = $_POST["content"] ;
        $answer->question_id = $_POST["question_id"] ;
        $answer->is_correct = $_POST["is_correct"] ;
        $answer->img = $fileName;
        $answer->save();
        header('location: ' . BASE_URL . "/answer");
        die;
      
    }
}
