<?php
namespace App\Controllers;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\Dumper;


class SubjectController{
    public function index(){
        $subjects = Subject::all();
        return view('mon-hoc.index',[
            'subjects' =>$subjects
        ]);

    }

    public function addForm(){
        return view('mon-hoc.add-form');
        // include_once "./app/views/admin/mon-hoc/add-form.php";
    }
    public function editForm($id){
       
        $model = Subject::find($id);
        return view('mon-hoc.edit-form',[
            'model' => $model
        ]);
    }
    public function saveAdd(){
    
        if($_POST["name"] == 0 || $_POST["name"] == ""){
            $_SESSION["error"] = "Môn học không hợp lệ";
            header('location: ' . BASE_URL . '/mon-hoc/tao-moi');
            die;
        }
        Subject::create([
            "name" => $_POST["name"]
        ]);
        header('location: ' . BASE_URL . '/mon-hoc');
        die;
    }
    public function saveEdit($id){
        $model = Subject::find($id);

        if(!$model){
            header('location: ' . BASE_URL . '/mon-hoc/cap-nhat/'.$id);
            die;
        }
        if($_POST["name"] == 0 || $_POST["name"] == ""){
            $_SESSION["error"] = "Môn học không hợp lệ ";
            header('location: ' . BASE_URL . '/mon-hoc/cap-nhat/'.$id);
            die;
        }
        $model->name = $_POST["name"];
        $model->save();
        header('location: ' . BASE_URL . '/mon-hoc');
        die;



    }

    public function remove($id){
        $x = Subject::find($id)->delete();
        header('location: ' . BASE_URL . '/mon-hoc');
        die;
    }
}
?>